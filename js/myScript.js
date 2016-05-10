$( document ).on( 'click', '#loadMore_Button', function () {
  $(this).text('Loading...');
   var loadbt = $(this);
    $.ajax({
      url: 'loadmore.php',
      type: 'POST',
      data: {
        page:$(this).data('page'),
      },
      success: function(response){
        if(response){
          loadbt.hide();
          $(".news_list").append(response);
        }
      }
    });
});