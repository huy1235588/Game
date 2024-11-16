
var dataSettings = $el.attr('data-hs-step-form-options') ? JSON.parse($el.attr('data-hs-step-form-options')) : {};


const profile = document.getElementById('addUserStepProfile');
const billingAddress = document.getElementById('addUserStepBillingAddress');
const confirmation = document.getElementById('addUserStepConfirmation');

const btnNextForm = document.getElementById('btnNextForm');

console.log(btnNextForm.getAttribute('next-options'));

btnNextForm.addEventListener('click', () => {
    if (profile.classList.contains('active')) {
        profile.style.display = "none";
        billingAddress.style.display = "block";
    }
});