
window.onload = function() {
             setTimeout(function() {
                 let flashMessage = document.querySelector('.flash-message');
                 if (flashMessage) {
                     flashMessage.style.display = 'none';
                 }
             }, 5000); // Dismiss after 5 seconds
         };

        //  datatable

        document.addEventListener('DOMContentLoaded', function () {
            $('.datatable').DataTable({
                responsive: true

            });
            $('.frontdatatable').DataTable({
                paging: false,
                searching: false,
                ordering: false,
                responsive: true


            });

        });

