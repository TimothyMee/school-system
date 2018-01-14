<?php
error_reporting(0);

 echo '
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$i.'">
    View Result
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">'.$studentInfo['firstname'].' Result</h4>
        </div>
        <div class="modal-body">
           <table class="table table-responsive table-bordered table-hover">
                <tr>
                      <th> COURSE CODE </th> 
                      <th> UNITS </th>
                      <th> GRADE</th>
                      <th> TCP</th>
                      <th> TNU</th>
                      <th> TNUP</th>
                      <th> GPA</th>
                      <th> REMARKS</th>
                </tr>';

                
                 foreach ($courses as $key => $Vvalue) {
                    echo '
                      <tr>
                            <td><strong>'.$Vvalue.'</strong></td>
                            <td><strong>'.$units[$key].'</strong></td>
                            <td><strong> '.$resultValues[$key].'</strong></td>
                            <td><strong> </strong></td>
                            <td><strong> </strong></td>
                            <td><strong> </strong></td>
                            <td><strong> </strong></td>
                           <td><strong> </strong></td>
                     </tr>
                ';

                }

                echo '
                    <tr>
                        <th></th>
                         <th></th>
                         <th></th>
                         <th>'.$totalGradePoints.'</th>
                         <th>'.$totalUnits.'</th>
                         <th>'.$totalPassedUnits.'</th>
                         <th>'.$GPA.'</th>
                         <th></th>
                    </tr>
               </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="hidden" name="student_id" value ='.$studentId.'>
            <input type="submit" class="btn btn-danger" value="Disapprove" name="disapprove">
            <input type="submit" class="btn btn-primary" value="Approve" name="approve">
          </div>
        </div>
      </div>
  </div>';

?>