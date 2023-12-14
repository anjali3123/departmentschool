<table id="report-contact-list" class="display nowrap table table-hover table-striped border"cellspacing="0" width="100%">
                                <thead>                               
                                    <tr>
                                        <th>Created At</th>
                                        <th>Student</th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>  
                                    </tr>                                      
                                </thead>
                                <tbody> 
                                      @foreach ($list as $lists)
                                     <tr>
                                        <td>{{ date("d-m-Y",strtotime($lists->created_at)) }}</td>                                
                                        <td>{{ empty($lists->student->fname)?'' : $lists->student->fname }} {{ empty($lists->student->lname)?'':$lists->student->lname }}</td>                                
                                        <td>{{ $lists->book->name }}</td>                                                             
                                        <td>{{ ($lists->status == 0)?'Isuue':'Return'}}</td>                                
                                        <td>{{ date("d-m-Y",strtotime($lists->to_date)) }}</td>                                
                                        <td>{{ empty($lists->return_date)?'': date("d-m-Y",strtotime($lists->return_date))}}</td>                                
                                       </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
                            