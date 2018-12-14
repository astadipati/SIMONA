<?php
echo
"<script>
window.print();
</script>";
?>
               
               <!DOCTYPE html>
               <html>
               <head>
                 <title>Report Table</title>
                 <style type="text/css">
                   @page{
                       /* A4 Landscape */
                       /* size: 29.7cm 21cm; */
                       /* Folio Landscape */
                       size: 33cm 21.6cm;
                       margin:5mm 5mm 5mm 5mm;
                   }
                   #outtable{
                     /* padding: 20px; */
                     border:1px solid #e3e3e3;
                     /* width:600px; */
                     /* border-radius: 5px; */
                   }
                
                   .short{
                     width: 50px;
                   }
                
                   .normal{
                     width: 150px;
                   }
                
                   table{
                     border-collapse: unset;
                     border: 1px;
                     font-family: arial;
                     color:#5E5B5C;
                   }
               
                   table tr{
                     font:normal 11px Tahoma, sans-serif;
                   }
                
                   thead th{
                     /* border: 1px; */
                     text-align: left;
                     /* padding: 10px; */
                   }
                
                   tbody td{
                     border-top: 1px solid #e3e3e3;
                     padding: 0px;
                   }
                
                   tbody tr:nth-child(even){
                     background: #F6F5FA;
                   }
                
                   tbody tr:hover{
                     background: #EAE9F5
                   }
                 </style>
               </head>
               <body>
                   <div id="outtable">
                     <table>
                         <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Perkara</th>
                            <th>Ruangan</th>
                            <th>Nama P</th>
                            <th>Nama T</th>
                            <th>Agenda</th>
                        </tr>
                      
                       <tr bgcolor="#f2f2f2" align="center">
                           <td><b>1</b></td>
                           <td><b>2</b></td>
                           <td><b>3</b></td>
                           <td><b>4</b></td>
                           <td><b>5</b></td>
                           <td><b>6</b></td>
                         
                       </tr>
                         </thead>
                         <tbody>
                         <?php
                           $i = 1; //nantinya akan digunakan untuk pengisian Nomor
                           foreach ($sidang->result() as $row) {
                                           ?>
                                           <tr>
                                              
                                               <td><?php $i++?></td>
                                               <td><?= $row->nomor_perkara?></td>
                                               <td><?= $row->nomor_perkara?></td>
                                               <td><?= $row->nomor_perkara?></td>
                                               <td><?= $row->nomor_perkara?></td>
                                               <td><?= $row->nomor_perkara?></td>
                                               
                                           </tr>
                                       <?php
                                           }
                                       ?>
                         </tbody>
                     </table>
                    </div>
               </body>
               </html>
