
<!-- Modal -->
<div class="modal fade" id="adsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ $section_Popup->content_1 }}</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <span>
                            {{ $section_Popup->content_2 }}
                            <a href="{{route('about')}}">Pelajari Lebih Lanjut</a> </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>