const menu = document.querySelector('.menu-appointments');


menu.addEventListener('click', function (event) {
    const appointment = event.target.closest('.appointment');
    if(!appointment) return;
    appointment.submit();
});





