
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

      <table style="border-bottom: 0.5px solid #cecfd5;">
        <tr>
          <td></td>
          <td></td>

          <td></td>
          <td></td>
        </tr>
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
          <td>
            <div><b>From/To (Duration)</b></div>
          </td>
          <td colspan="3">
            <div style="border:0.5px solid #000;" align="center">{{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}</div>
          </td>
        </tr>
        <tr>
          <td>
            <p><b>Number of days requested</b></p>
          </td>
          <td colspan="3">
            <p style="border:0.5px solid #000;" align="center">{{$leave->days}}</p>
          </td>
        </tr>
        <tr>
          <td>
            <div><b>Destination & Contact No</b></div>
          </td>
          <td colspan="3">
            <div style="border:0.5px solid #000;" align="center">{{ $leave->destination }}/{{ $leave->nok_contact }}</div>
          </td>
        </tr>
        <tr>
          <td><div><b>Date of request</b></div></td>
          <td><div>{{$leave->approvedon}}</div></td>

          <td><div><b>Signature</b></div></td>
          <td><div>{{$leave->approvedon}}</div></td>
        </tr>
      </table>
        
      

        <h3><strong>TYPE OF LEAVE REQUESTED</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td>
            <div>Annual Leave</div>
            </td>
          <td>
          <div style="width:30%;height:30px;border:0.5px solid #000;"><b>{{$leave->start_date}}</b></div>
          </td>
        
          <td>
            <div>Bereavement Leave</div>
            </td>
          <td>
          <div style="width:0.50px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div>
          </td>
        
          <td>
            <div>Study Leave</div>
            </td>
          <td>
          <div style="width:30px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div>
        </td>
        </tr>
        <tr>
          <td>
            <div>Maternity Leave</div></td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div></td>
        
          <td>
            <div>Paternity leave</div></td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div></td>
        
          <td>
            <div>Domestic problems</div></td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div></td>
          </tr>
          <tr>
          <td>
            <div>Balance C/F</div></td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">{{$leave->start_date}}</div></td>
        </tr>  
      </table>
      

        <h3><strong>IMMEDIATE SUPERVISOR APPROVAL</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td>
            <b>Name:</b></td>
          <td><div>{{$leave->approvedbys}}</div></td>
        
          <td><div><b>Approved</b></div></td>
          <td>YES</td>
          <td><div style="border:0.5px solid #000;">@if($leave->s_approval_status == 'Approved')
           <span>Approved</span>
           @else 
            @endif</div></td>
          <td>NO</td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">@if($leave->s_approval_status == 'Rejected')
           <span>Rejected</span>
           @else - 
            @endif</div></td>
        </tr>
        <tr>
          <td><div><b>Comments:</b></div></td>
          <td colspan="5"><div>{{$leave->s_comment}}</div></td>
        </tr>
        
        <tr>
          <td><div><b>Date</b></div></td>
          <td colspan="2"><div>{{$leave->approvedon}}</div></td>

          <td><div><b>Signature</b></div></td>
          <td colspan="3"><div>{{$leave->approvedon}}</div></td>
        </tr>
      </table>
      
      <h3><strong>SENIOR MANAGER APPROVAL</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td>
            <b>Name:</b></td>
          <td><div>{{$leave->approvedbym}}</div></td>
        
          <td><div><b>Approved</b></div></td>
          <td>YES</td>
          <td><div style="border:0.5px solid #000;">
            @if($leave->m_approval_status == 'Approved')
           <span>Approved</span>
           @else 
            @endif
          </div></td>
          <td>NO</td>
          <td><div style="width:50%;height:50px;border:0.5px solid #000;">@if($leave->m_approval_status == 'Rejected')
           <span>Rejected</span>
           @else - 
            @endif</div></td>
        </tr>
        <tr>
          <td><div><b>Comments:</b></div></td>
          <td colspan="5"><div>{{$leave->m_comment}}</div></td>
        </tr>
        
        <tr>
          <td><div><b>Date</b></div></td>
          <td colspan="2"><div>{{$leave->m_approvedon}}</div></td>

          <td><div><b>Signature</b></div></td>
          <td colspan="3"><div>{{$leave->m_approvedon}}</div></td>
        </tr>
      </table>
      
     <h3><strong>HEAD CPHL APPROVAL</strong></h3>
      <table  style="border-bottom: 0.5px solid #cecfd5;" >
        <tr>
          <td colspan="2">
            
            </td>
          
        
          <td><div><b>Approved</b></div></td>
          <td>YES</td>
          <td><div style="border:0.5px solid #000;">@if($leave->h_approval_status == 'Approved')
           <span>Approved</span>
           @else -
            @endif</div></td>
          <td>NO</td>
          <td><div style="width:30px;height:30px;border:0.5px solid #000;">@if($leave->h_approval_status == 'Rejected')
           <span>Rejected</span>
           @else -
            @endif</div></td>
        </tr>
        <tr>
          <td><div><b>Comments:</b></div></td>
          <td colspan="5"><div>{{$leave->h_comment}}</div></td>
        </tr>
        
        <tr>
          <td><div><b>Date</b></div></td>
          <td colspan="2"><div>{{$leave->h_approvedon}}</div></td>

          <td><div><b>Signature</b></div></td>
          <td colspan="3"><div>{{$leave->h_approvedon}}</div></td>
        </tr>
      </table>


    </body>
    </html>

    