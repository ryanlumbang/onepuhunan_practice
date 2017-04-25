$(document).ready(function() {
    var amountScrolled = 250;

    /* for routing */
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    /* datatables customer toolbar tools */
    var approve = '<button id="btn_approve" class="uk-button uk-button-small" disabled><i class="uk-icon-check"></i> Approve</button>';
    var reject  = '<button id="btn_reject"  class="uk-button uk-button-small" disabled><i class="uk-icon-times"></i> Reject</button>';
    var revert  = '<button id="btn_revert"  class="uk-button uk-button-small" disabled><i class="uk-icon-level-down"></i> Revert</button>';

    /* for enabling/disabling of button */
    var counterChecked = 0;

    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

    $(window).scroll(function() {
        if( $(window).scrollTop() > amountScrolled ) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });

//    var tempScrollTop = $(window).scrollTop();
//    $(window).scrolltop(tempScrollTop);
//
//    $(function() {
//       $(window).unload(function() {
//          var scrollPosition = $('#tbl_los').scrollTop();
//          localStorage.setItem("scrollPosition", scrollPosition);
//       });
//       if(localStorage.scrollPosition) {
//          $('#tbl_los').scrollTop(localStorage.getItem("scrollPosition"));
//       }
//    });

    $('a.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    $('#hr-memo').DataTable({
        'order' : [[0, 'desc'], [1, 'asc']]
    });

    /* LOS datatable initialization */
    var tbl_los = $('#tbl_los').DataTable({
        //'serverSide': true,
        'ajax' : {
            'url': baseUrl + '/operations/ops_pending_app'
        },
        'columns' : [
            {
                'width': '1%',
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'uk-text-center',
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            },
            {'width': '4%', 'className': 'dt-center', 'data': 'OurBranchID'},
            {'width': '4%', 'className': 'dt-center', 'data': 'GroupID'},
            {'width': '5%', 'className': 'dt-center', 'data': 'FileNo'},
            {'width': '15%', 'data': 'ClientName'},
            {'width': '5%', 'className': 'dt-center', 'data': 'ClientID'},
            {'width': '4%', 'className': 'dt-center', 'data': 'LOSLoanTypeID'},
            {'width': '4%', 'className': 'dt-center uk-text-bold', 'data': 'ProcessValue'},
            {'width': '4%', 'data': null, 'defaultContent': '<button class="uk-button uk-button-small uk-button-primary">View Profile</button>'},
            {'visible': false, 'targets': 9, 'data': 'AsOfDate'}
        ],
        'iDisplayLength': 25,
        'oLanguage': {
            'sSearch': 'Search all columns:',
            'sEmptyTable': 'No pending application'
        },
        'deferRender': true,
        //'stateSave': true,
        'drawCallback' : function () {
            var api  = this.api();
            var rows = api.rows({ page : 'current' }).nodes();
            var last = null;

            api.column(9, { page : 'current' }).data().each( function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group uk-text-bold"><td colspan="9">' + group + '</td></tr>');
                    last = group;
                }
            });

            $('tbody').find('.group').each(function (i, v) {
                var rowCount = $(this).nextUntil('.group').length;
                $(this).find('td:first').append($('<span />').append($('<b/>', {
                    'text': ' (' + rowCount + ')'
                })));
            });
        },
        'bSort': false,
        'dom': '<"toolbar">frtip'
    });
    tbl_los.order( [ 9, 'desc' ] ).draw();

    /* datatables content: view profile button */
    $('#tbl_los tbody').on('click', 'button', function() {
        var data = tbl_los.row($(this).parents('tr')).data();
        location.href = data.GroupID + '/' + data.FileNo;
    });

    /* get hidden field for currently logged user */
    var role = $('#txt_role').val();;

    /* sometimes it's working, sometimes not :P */
    if(role === 'qa') {
        $('#losbody div.toolbar').html(approve + reject);
    } else {
        $('#losbody div.toolbar').html(approve + reject + revert);
    };

    var actionArray = new Array();

    /* enabling/disabling a button */
    $('#tbl_los').on('change', 'input[type="checkbox"]', function() {
        this.checked ? counterChecked++ : counterChecked--;
        getAllCheckedItems();

        if(actionArray.includes('REJ')) {
            $('#btn_approve').prop('disabled', true);
        } else {
            counterChecked > 0 ? $('#btn_approve').prop('disabled', false) : $('#btn_approve').prop('disabled', true);
        }
        counterChecked > 0 ? $('#btn_reject').prop('disabled', false) : $('#btn_reject').prop('disabled', true);
        counterChecked > 0 ? $('#btn_revert').prop('disabled', false) : $('#btn_revert').prop('disabled', true);
    });

    function getAllCheckedItems() {
        actionArray.splice(0, actionArray.length);
        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
            var data = tbl_los.row($(this).parents('tr')).data();
            actionArray[actionArray.length] = data.ProcessValue;
        });
    }

    // checkbox: approve all selected entries.
    $('#btn_approve').click(function () {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function () {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                type: 'POST',
                url: baseUrl + '/operations/los_laf/' + data.FileNo + '/APR'
            });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId  = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata  = $('#txt_datedata').val();

            if (row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    $('#btn_reject').click(function() {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                type: 'POST',
                url: baseUrl + '/operations/los_laf/' + data.FileNo + '/REJ'
            });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata = $('#txt_datedata').val();

            if(row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    $('#btn_revert').click(function() {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                type: 'POST',
                url: baseUrl + '/operations/los_laf/' + data.FileNo + '/REV'
            });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata = $('#txt_datedata').val();

            if(row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    // expand all accordion headers.
    var accordion = UIkit.accordion(UIkit.$('#los-accordion'), {collapse:false, showfirst: false});
    accordion.find('[data-wrapper]').each(function () {
        accordion.toggleItem(UIkit.$(this), true, false);
    });

    // initialize tellecaller table
    var tbl_tc = $('#tbl_tc').DataTable({
        'ajax' : {
            'url': baseUrl + '/sys/get_tc_questions'
        },
        'columns': [
            {
                'width': '10%',
                'searchable': false,
                'orderable': false,
                'data': 'question_no'
            },
            {
                'width': '42%',
                'data': 'question'
            },
            {
                'width': '12%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false,
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            },
            {
                'width': '12%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false,
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            },
            {
                'width': '12%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false,
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            },
            {
                'width': '12%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false,
                'render': function(data, type, full, meta) {
                    return '<a href="#btnEdit" rel="modal:open"> <i class="uk-icon-edit"></i> EDIT </a>';
                }
            },
        ],
        'bSort': false,
        'dom': '<"toolbar">frtip',
        'searching': false,
        "bLengthChange": false,
        columnDefs: [ {
            orderable: false,
            targets:   0
        } ],
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ -1,-2 ,-3,-4]
            }
        ],
        order: [[ 0, 'asc' ]],
    });
    tbl_tc.order([0, 'asc']).draw();

    $('div.dataTables_filter ').addClass('op-search-box');
    $('div.dataTables_filter label').addClass('uk-icon-search');

});





