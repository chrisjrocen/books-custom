const movieContainers = [...document.querySelectorAll('.movie-container')];
const nextButtons = [...document.querySelectorAll('.next-button')];
const previousButtons = [...document.querySelectorAll('.previous-button')];

movieContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nextButtons[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

   previousButtons[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;


}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

jQuery(document).ready(function ($) {
	$('.movie-info__year').each(function(e){
		var button = $(this);
		button.on('click', function() {
			var data = {
				action: 'filter_movies',
				year: $(this).attr('name')
			};
			$.ajax({
				url: movies_ajax.ajax_url,
				type: "POST",
				data: data,
				dataType: "json",
				success: function (doc) {
				}
			});
		});
	})
});


