var images = document.querySelectorAll('.images img');
for (var i = 0; i < images.length; i++) {
  images[i].addEventListener('click', function() {
    var url = this.parentNode.href;
    window.location.href = url;
  });
}
