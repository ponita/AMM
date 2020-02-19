
    <style type="text/css">
    .small{
      font-size: 9px;
    }
    .container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid black;
  border-width: 0 5px 5px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
    table {
      padding: 2px;
    }
    </style>
    
    <body class="small">
      <h3><strong>INFORMATION TO BE FILLED IN BY APPLICANT:</strong></h3>
      <table style="border-bottom: 0.5px solid #cecfd5;">
        <tr>
          <td>
            <div><b>Name</b></div>
          </td>
          <td colspan="3">
            <div style="border:0.5px solid #000;" align="center">{{$leave->name}}</div>
          </td>
        </tr>
        <tr>
          <td>
            <div><b>Position</b></div>
          </td>
          <td colspan="3">
            <div style="border:0.5px solid #000;" align="center">{{$leave->position}}</div>
          </td>
        </tr>
        <tr>
          <td><div><b>Date of request</b></div></td>
          <td><div>{{$leave->created_at}}</div></td>

          <td><div><b>Signature</b></div></td>
          <td><div>{{$leave->created_at}}</div></td>
        </tr>
      </table>
        
      

        <h3><strong>TYPE OF LEAVE REQUESTED</strong></h3>
      <table  class="table table-condensed table-bordered" BORDER="0.5px" CELLPADDING="2" CELLSPACING="0" width="100%" >
        <tr>
          <th><b>Type of leave</b></th>
          <th><b>Leave balance</b></th>
          <th><b>Dates requested</b></th>
          <th><b>Total # of days requested</b></th>
        </tr>
        <tr>
            <td>
            <div>Annual Leave</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Annual')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Annual')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Sick Leave</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Sick')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Sick')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Administrative Leave (5)</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Administrative')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Administrative')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Martenity Leave</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Maternity')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Maternity')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Paternity Leave</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Paternity')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Paternity')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Leave without pay</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Leave without pay')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Leave without pay')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Makeup Holiday</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Makeup Holiday')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Makeup Holiday')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div>Bereavement Leave (5)</div>
            </td>
            <td>
            {{$leave->start_date}}
            </td>
            <td>
            @if($leave->leave_type == 'Bereavement')
            {{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}
            @else -
            @endif
            </td>
            <td>
            @if($leave->leave_type == 'Bereavement')
            {{getActualNumberofDays($leave->date_from, $leave->date_to)}}
            @else -
            @endif
            </td>
        </tr>
      </table>
     
      

        <h3><strong>IMMEDIATE SUPERVISOR APPROVAL:</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td colspan="4">Name:<span>&nbsp;&nbsp;{{$leave->approvedbys}}</span></td>
        </tr>
        <tr>
          <td colspan="4"><div>Comments:<span>&nbsp;&nbsp;{{$leave->s_comment}}</span></div></td>
        </tr>
        
        <tr>
          <td colspan="2"><div>Date:<span>&nbsp;&nbsp;{{$leave->s_approvedon}}</span></div></td>
          <td colspan="2"><div>Signature:<span>&nbsp;&nbsp;{{$leave->s_approvedon}}</span></div></td>
        </tr>
      </table>

         <h3><strong>SENIOR MANAGER APPROVAL:</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td colspan="4">Name:<span>&nbsp;&nbsp;{{$leave->approvedbym}}</span></td>
        </tr>
        <tr>
          <td colspan="4"><div>Comments:<span>&nbsp;&nbsp;{{$leave->m_comment}}</span></div></td>
        
        </tr>
        
        <tr>
          <td colspan="2"><div>Date<span>&nbsp;&nbsp;{{$leave->m_approvedon}}</span></div></td>
          <td colspan="2"><div>Signature<span>&nbsp;&nbsp;{{$leave->m_approvedon}}</span></div></td>
        </tr>
      </table>
      
      
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td colspan="2">
            <strong style="font-size: 12">DIRECTOR CPHL/UNHLS APPROVAL:</strong>
            </td>
          
        
          <td colspan="1"><div><b>Approved:</b></div></td>
          <td colspan="1"><div style="border:0.5px solid #000;">@if($leave->h_approval_status == 'Approved')
           <span>YES</span>
           @else NO
            @endif</div></td>
        </tr>
        <tr>
          <td colspan="4">Name:<span>&nbsp;&nbsp;{{$leave->approvedbyh}}</span></td>
        </tr>
        <tr>
          <td><div>Comments:<span>&nbsp;&nbsp;{{$leave->h_comment}}</span></div></td>
        </tr>
        
        <tr>
          <td colspan="2"><div>Date<span>&nbsp;&nbsp;{{$leave->h_approvedon}}</span></div></td>
          <td colspan="2"><div>Signature<span>&nbsp;&nbsp;{{$leave->h_approvedon}}</span></div></td>
        </tr>
      </table>


    </body>
    </html>

    