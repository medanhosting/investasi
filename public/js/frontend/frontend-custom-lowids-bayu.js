$('#order-table').DataTable({
    "info": false,
    "ordering": false,
    "searching": false,
    "lengthChange": false,
    "language": {
        "emptyTable": "No transactions available"
    }
});

$('.input-daterange').datepicker({
    format: "dd/mm/yyyy"
});

function orderFilter(url){
    var search = document.getElementById("search");
    if(search != null){
        document.location = url + "?start=" + $('#start').val() + "&end=" + $('#end').val() + "&search=" + $('#search').val();
    }
    else{
        document.location = url + "?start=" + $('#start').val() + "&end=" + $('#end').val();
    }
}

function searchKey(e){
    var key = e.keyCode || e.which;
    if(key == 13){
        window.location = "/search/" + $("#search").val();
        return false;
    }
}

function isEmpty(value){
    return (value == null || value.length === 0);
}

function filterCategory(e){
    // Get existing price filter
    var max = $("#max").val();
    var min = $("#min").val();

    // Get existing sort filter value
    var sort = $("#filter-sort option:selected").val();

    // Get category filter value
    var category = e.value;

    var url = "/search/" + $("#search").val() + "?category=" + category + "&sort=" + sort;
    if(!isEmpty(max)){
        url += "&max=" + max;
    }

    if(!isEmpty(min)){
        url += "&min=" + min;
    }

    window.location = url;
}

function filterPrice(){
    // Get price filter value
    var max = $("#max").val();
    var min = $("#min").val();

    // Get existing category filter
    var category = $("#filter-category option:selected").val();

    // Get existing sort filter value
    var sort = $("#filter-sort option:selected").val();

    if(!isEmpty(max) || !isEmpty(min)){
        var url = "/search/" + $("#search").val() + "?category=" + category + "&sort=" + sort;
        if(!isEmpty(max)){
            url += "&max=" + max;
        }

        if(!isEmpty(min)){
            url += "&min=" + min;
        }

        window.location = url;
    }
}

function sortFilter(e){
    // Get existing price filter
    var max = $("#max").val();
    var min = $("#min").val();

    // Get existing category filter
    var category = $("#filter-category option:selected").val();

    // Get sort filter value
    var sort = e.value;

    var url = "/search/" + $("#search").val() + "?category=" + category + "&sort=" + sort;
    if(!isEmpty(max)){
        url += "&max=" + max;
    }

    if(!isEmpty(min)){
        url += "&min=" + min;
    }

    window.location = url;
}