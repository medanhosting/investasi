<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 14-Nov-17
 * Time: 3:00 PM
 */

namespace App\Libs;


use App\Models\Blog;
use App\Models\BlogReadUser;
use App\Models\BlogUrgent;

class UrgentNews
{
    public static function GetBlogList($userId){

        $notReadBlogId = [];
        $blogUrgents = BlogUrgent::select('id')->where('status_id', 1)->get();

        foreach($blogUrgents as $blogUrgent){
            array_push($notReadBlogId, $blogUrgent->id);
        }

        //get user blog read list
        $blogReadUsers = BlogReadUser::where('user_id', $userId)
//                ->where('status_id', 2)
            ->wherein('blog_urgent_id', $notReadBlogId)
            ->get();


        //delete already read blog
        foreach($blogReadUsers as $blogRead){
            if($blogRead->status_id == 2){
                $notReadBlogId = array_diff($notReadBlogId, [$blogRead->blog_urgent_id]);
            }
        }

        $blogReadFinalArr = [];
        if(count($blogReadUsers) > 0 || count($notReadBlogId) > 0) {
            foreach ($notReadBlogId as $BlogId) {
                $blogReadUsers2 = BlogReadUser::where('user_id', $userId)
                    ->where('blog_urgent_id', $BlogId)
                    ->count();

                //if already in DB, and not read
                if ($blogReadUsers2 > 0) {
                    $blog = $blogReadUsers->where('blog_urgent_id', $BlogId)->where('status_id', 1)->first();

                    $blogUrgent = BlogUrgent::find($blog->blog_urgent_id);
                    $blogDB = Blog::find($blogUrgent->Blog->id);

                    array_push($blogReadFinalArr, $blogDB->id);
                } //not yet save on database
                else {
                    $blogReadUserNew = BlogReadUser::create([
                        'user_id' => $userId,
                        'blog_urgent_id' => $BlogId,
                        'status_id' => 1
                    ]);

                    $blogUrgent = BlogUrgent::find($BlogId);
                    $blogDB = Blog::find($blogUrgent->Blog->id);

                    array_push($blogReadFinalArr, $blogDB->id);

                }
            }
        }
        $blogReadUsers = Blog::wherein('id', $blogReadFinalArr)->get();

        return $blogReadUsers;
    }
}