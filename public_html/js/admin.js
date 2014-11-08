//title to url conversion

function url() {
  var title = document.getElementById('blogTitle').value;
  var titleUrl = title.replace(/[^a-zA-Z -]+/g, '').replace(/ /g,"-").toLowerCase();
  document.getElementById('blogURL').value = titleUrl;
};