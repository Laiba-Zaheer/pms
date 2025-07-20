function showform(formId){
  document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
  document.getElementById(formId).classList.add("active");
}//this wayonly the form with matching id will be displayed
