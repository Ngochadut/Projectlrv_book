$(document).ready(function () {
  $('.search-btn').click(function () {
    event.preventDefault();
    var category_name = $("option:selected").text();
    // alert(category_name)
    let search =  $("#input_search").val();
    window.location.href = '?search=' + search + '&category=' + category_name;
  });
  // $('#form-search').submit(function(){
  //   alert('submit')
  // })
});
