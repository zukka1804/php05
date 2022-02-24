$(".openbtn1").click(function () {
    $(this).toggleClass('active');
});

$(function () {
    $('.openbtn1').on('click', function () {        // js-btnクラスをクリックすると、
      $('.menu ').toggleClass('open'); // メニューとバーガーの線にopenクラスをつけ外しする
    })
  });