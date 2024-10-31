/** to get cookie value */
function ninjachat_getcookie(name) {
  var cookie_name = name + "=";
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    var extracted_cookie = cookies[i];
    while (extracted_cookie.charAt(0) == " ")
      extracted_cookie = extracted_cookie.substring(1, extracted_cookie.length);
    if (extracted_cookie.indexOf(cookie_name) == 0)
      return extracted_cookie.substring(
        cookie_name.length,
        extracted_cookie.length
      );
  }
  return null;
}

jQuery(document).ready(function ($) {
  var ninjachat_id = 0;
  jQuery("a").each(function (idx) {
    if (
      jQuery(this).attr("href") == "admin.php?page=ninjachat/classes/class.ninjachatplugin_ninjachat.php"
    ) {
      if (ninjachat_id == 1) {
        jQuery(this).css("display", "none");
      }
      ninjachat_id++;
    }
  });
  /** to show other apps  **/
  var id1 = 0;
  jQuery("a").each(function (idx) {
    if (
      jQuery(this).attr("href") == "admin.php?page=Other"
    ) {
      jQuery(this).addClass("show_popup_ninjachat");
      jQuery(this).attr("href", "#");
      jQuery(this).attr("id", "show_popup_ninjachat");
      id1++;
    }
  });
  /** to close other apps  **/
  var modal = document.getElementById("ninjachatModal");
  var btn = document.getElementById("show_popup_ninjachat");
  var span = document.getElementsByClassName("close")[0];
  btn.onclick = function () {
    modal.style.display = "block";
  };
  span.onclick = function () {
    modal.style.display = "none";
  };
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
});