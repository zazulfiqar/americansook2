/***** Animation JS *****/
new WOW().init();

$(function(){
$('#menu').slicknav();
});

// quantity start
var QtyInput = (function () {
var $qtyInputs = $(".qty-input");
if (!$qtyInputs.length) {
return;
}
var $inputs = $qtyInputs.find(".product-qty");
var $countBtn = $qtyInputs.find(".qty-count");
var qtyMin = parseInt($inputs.attr("min"));
var qtyMax = parseInt($inputs.attr("max"));
$inputs.change(function () {
var $this = $(this);
var $minusBtn = $this.siblings(".qty-count--minus");
var $addBtn = $this.siblings(".qty-count--add");
var qty = parseInt($this.val());
  if (isNaN(qty) || qty <= qtyMin) {
  $this.val(qtyMin);
  $minusBtn.attr("disabled", true);
  } else {
  $minusBtn.attr("disabled", false);

  if(qty >= qtyMax){
  $this.val(qtyMax);
  $addBtn.attr('disabled', true);
  } else {
  $this.val(qty);
  $addBtn.attr('disabled', false);
  }
}
});

$countBtn.click(function () {
var operator = this.dataset.action;
var $this = $(this);
var $input = $this.siblings(".product-qty");
var qty = parseInt($input.val());

if (operator == "add") {
qty += 1;
if (qty >= qtyMin + 1) {
$this.siblings(".qty-count--minus").attr("disabled", false);
}

if (qty >= qtyMax) {
$this.attr("disabled", true);
}
} else {
qty = qty <= qtyMin ? qtyMin : (qty -= 1);

if (qty == qtyMin) {
$this.attr("disabled", true);
}

if (qty < qtyMax) {
$this.siblings(".qty-count--add").attr("disabled", false);
}
}

$input.val(qty);
});
})();
// quantity end


$(document).ready(function() {
//toggle the component with class accordion_body
$(".accordion_head").click(function() {
if ($('.accordion_body').is(':visible')) {
$(".accordion_body").slideUp(300);
$(".plusminus").text('+');
}
if ($(this).next(".accordion_body").is(':visible')) {
$(this).next(".accordion_body").slideUp(300);
$(this).children(".plusminus").text('+');
} else {
$(this).next(".accordion_body").slideDown(300);
$(this).children(".plusminus").text('-');
}
});
});

document.getElementById("expand").addEventListener("click", function() 
{
var displayDiv = document.getElementById('unhide');
var displayValue = (displayDiv.style.display === "block") ? "none" : "block";
this.innerHTML = (displayValue === "block") ? "Category" : "Category";
displayDiv.style.display = displayValue;
});


