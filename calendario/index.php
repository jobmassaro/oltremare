<!DOCTYPE html>
<hrml>
<head>
<style type="text/css" ></style>
<link href='../assets/css/calendar/fullcalendar.css' rel='stylesheet' />
<link href='../assets/css/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../assets/css/calendar/moment.min.js'></script>
<script src='../assets/css/calendar/jquery.min.js'></script>
<script src='../assets/css/calendar/fullcalendar.min.js'></script>
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
</head>
<script>

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2016-01-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2016-01-01'
                },
                {
                    title: 'Long Event',
                    start: '2016-01-07',
                    end: '2016-01-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-01-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-01-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2016-01-11',
                    end: '2016-01-13'
                },
                {
                    title: 'Meeting',
                    start: '2016-01-12T10:30:00',
                    end: '2016-01-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2016-01-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2016-01-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2016-01-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2016-01-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2016-01-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2016-01-28'
                }
            ]
        });
        
    });

</script>
<div id='calendar'></div>

<a href="http://localhost/oltremare">Torna Indietro</a>


<?php
/*
echo "<table width=\"100%\">\n";
    
    echo "<td width=\"85%\" align=\"center\" valign=\"top\">\n";
            
    $monthNames = Array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
    
    //tra le variabili globali definiamo..
    //larghezza tabella;
    $Tablewight = "90%";
    //altezza celle
    $Cellheight = "60px";
    $Cellwidth = "100px";
    

    if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
    if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

    $cMonth = $_REQUEST["month"];
    $cYear = $_REQUEST["year"];

    $prev_year = $cYear;
    $next_year = $cYear;
    $prev_month = $cMonth-1;
    $next_month = $cMonth+1;

    if ($prev_month == 0 ) {
        $prev_month = 12;
        $prev_year = $cYear - 1;
    }
    if ($next_month == 13 ) {
        $next_month = 1;
        $next_year = $cYear + 1;
    }


echo "<table width=\"$Tablewight\" align=\"center\">\n";
        ?>
        <tr align="center">
            <td bgcolor="#999999" style="color:#FFFFFF"><big>Calendario delle scadenze</big>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="50%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Precedente</a></td>
                        <td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Prossimo</a>  </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr align="center">
                        <td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth - 1] . ' ' . $cYear; ?></strong></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Lunedì</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Martedì</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Mercoledì</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Giovedì</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Venerdì</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Sabato</strong></td>
                        <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Domenica</strong></td>
                    </tr>
                    <?php
                    
                    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
                    $maxday = date("t",$timestamp);
                    $thismonth = getdate ($timestamp);
                    $startday = $thismonth['wday'];
                    $oggi = date('Ynj');
                    if($startday == "0")
                    {
                        $startday = "6";
                    }
                    else
                    {
                        $startday--;
                    }
                    //echo $startday;
                    //echo $maxday;
                    //echo $maxday+$startday;
                    for ($i=0; $i<($maxday+$startday); $i++)
                    {
                        //echo $i;
                        if(($i % 7) == 0 )
                        {
                            echo "<tr>\n";
                        }
                        
                        if($i < $startday)
                        {
                            echo "<td></td>\n";
                        }
                        else
                        {
                            
                            if(($i % 7) == "6")
                            {
                                echo "<td bgcolor=\"green\" align='center' valign='top' width=\"$Cellwidth\" height=\"$Cellheight\">\n";
                                echo "<a href=\"".$_directory."scadenziario.php?giorno=".($thismonth['year']."-".$thismonth['mon']."-".($i - $startday + 1))."\">\n";
                                echo "<font size=\"4\">". ($i - $startday + 1) . "</font></a>\n";
                               
                            }
                            elseif(($i % 7) == "5")
                            {
                                echo "<td bgcolor=\"ciain\" align='center' valign='top' width=\"$Cellwidth\" height=\"$Cellheight\">\n";
                                echo "<a href=\"".$_directory."scadenziario.php?giorno=".($thismonth['year']."-".$thismonth['mon']."-".($i - $startday + 1))."\">\n";
                                echo "<font size=\"4\">". ($i - $startday + 1) . "</font></a>\n";
                               
                            }
                            elseif(($thismonth['year'].$thismonth['mon'].($i - $startday + 1)) == $oggi)
                            {
                               echo "<td align='center' bgcolor=\"#FFCCFF\" valign='top' width=\"$Cellwidth\" height=\"$Cellheight\">\n";
                               echo "<a href=\"".$_directory."scadenziario.php?giorno=".($thismonth['year']."-".$thismonth['mon']."-".($i - $startday + 1))."\">\n";
                               echo "<font size=\"4\"><b>". ($i - $startday + 1) . "</b></font></a>\n";
                               
                            }
                            else
                            {
                               echo "<td align='center' valign='top' width=\"$Cellwidth\" height=\"$Cellheight\">\n";
                               echo "<a href=\"".$_directory."scadenziario.php?giorno=".($thismonth['year']."-".$thismonth['mon']."-".($i - $startday + 1))."\">\n";
                               echo "<font size=\"4\">". ($i - $startday + 1) . "</font></a>\n";
                               
                               
                            }
                            
                            //uguale a tutte le celle...
                            
                            $result = tabella_scadenziario("data_singola", $_percorso, ($thismonth['year']."-".$thismonth['mon']."-".($i - $startday + 1)));
                               //echo "<ul align=\"left\"><font size=\"2\">\n";
                            

                               // echo "<font size=\"1\">\n";
                               foreach ($result AS $dati)
                               {
                                  echo "<li style=\"font-size: 0.7em;\" align=\"left\">$dati[descrizione]</li>\n"; 
                               }

                               echo "</font>\n";
                               //echo "</ul>\n";
                               
                               echo "</td>\n"; 

                            
                        }
                        
                        if(($i % 7) == 6 )
                        {
                            echo "</tr>\n";
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <?php
    echo "</td></tr></table></body></html>";