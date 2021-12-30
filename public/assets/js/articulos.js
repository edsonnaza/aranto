 

$(document).ready(function () {
  $("#sort").easyAutocomplete({
    url: function (search) {
      return "{{route('autocomplete.fetch')}}?search=" + search;
    },

    getValue: "title",

    list: {
      onChooseEvent: function () {
        var selectedPost = $("#sort").getSelectedItemData();
        window.location = "{{url('autocomplete.fetch')}}" + "/" + selectedPost.id;
      }
    }
  });
 });