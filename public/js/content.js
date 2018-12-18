
$(document).on('click','.btn-like', function(){
  var _this = $(this);

  var _url = "/like/" + _this.attr('data-type')
             + "/" + _this.attr('data-model-id');

    $.get(_url,function(data){
      _this.addClass('btn-danger btn-unlike').removeClass('btn-outline-success btn-like').html('unlike');
      var likeNumber = _this.parents('.like_wrapper').find('.like_number');
      likeNumber.html( parseInt(likeNumber.html()) + 1);
    });


});


$(document).on('click','.btn-unlike', function(){
  var _this = $(this);

  var _url = "/unlike/" + _this.attr('data-type')
             + "/" + _this.attr('data-model-id');

    $.get(_url,function(data){
      _this.addClass('btn-outline-success btn-like').removeClass('btn-danger btn-unlike').html('like');
      var likeNumber = _this.parents('.like_wrapper').find('.like_number');
      likeNumber.html( parseInt(likeNumber.html()) - 1);
    });


});
