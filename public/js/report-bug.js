/**
 * Name: ReportBug js  file 
 * Purpose: Call the modal 
 * Package: public/js
 * Created On: 30th Sept, 2016
 * Author: msfi-krishnadev
*/

var report = {

    /**
     * Function which contains all DOM element function
     *
     * @param: void
     * @return: void
     */
     global: function() {

        $(document).on('click', '#report_issue', function () {
            $('#makeIssue').modal();
        });
     }
};