
$(document).ready(function () {
    $(document).on('click', '#maisPat', function (e) {
        e.preventDefault();
        var original = $(".pat:eq(0)");
        var selectPats = $("select.selectPats");
        var clone = original.clone();
        $('option', clone).filter(function(i) {
          return selectPats.find('option:selected[value="' + $(this).val() + '"]').length;
        }).remove();
        var ultimo = $("select.selectPats:last option").length;
        console.log(ultimo);
        if (ultimo > 2) {
          $('.todospat').append(clone);
        }



        let num = $('.todospat').length;
        clone.prepend("<label> Patrocinador: "+(parseInt(num))+"<label>");

    });
});

$(document).ready(function () {
    $(document).on('click', '#menosPat', function (e) {
        e.preventDefault();
          var x = document.querySelector('.todospat').children;
          var pat = event.target;
            if (x.length > 1) pat.parentNode.remove();
        });

});

$(document).ready(function () {
    $(document).on('click', '#butClose', function (e) {
        e.preventDefault();
        document.getElementById('alert').style.display = 'none';
    });

});

$(document).ready(function () {
      jQuery(".selectPats").change(function(){
          if(jQuery(this).val() !== 'null'){
            $('.invest').attr("required", true);
            $('.invest').removeAttr("disabled");
            $('#maisPat').removeAttr("disabled");
          }
          if(jQuery(this).val() === 'null'){
            $('#maisPat').attr("disabled",true);
            $('.invest').removeAttr("required");
            $('.invest').attr("disabled",true);
          }
    });


});
