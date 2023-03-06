/*
 * metodo urldecode para objeto tipo string
 * @return string
 */

String.prototype.urlDecode = function() {

  str = this.replace(/\+/g," ");
  str = unescape(str);
  return str;
}