<?php

require ('../app/middleware/fpdf/fpdf.php');

/** @noinspection ALL */

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Advertisement and Earnings Stats',0,1,'C');
        $this->Ln(5);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

class Singer extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_singer()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function events($method = null)
    {

        $db = new Database();

        if (empty($method)) {
            $data['records'] = $db->query("SELECT * FROM event");
            $this->view('singer/events/your-events', $data);
        } else {
            message("Page not found");
            redirect('singer/events');
        }
    }

    public function stat($method = null) {
        $db = new Database();

        if(empty($method)) {
            // Calling a Stored procedure named 'report_singer(user_id)'
            $data['stats'] = $db->query("CALL report_singer(:user_id)",['user_id' => Auth::getUser_id()])[0] ?: NULL;

            $data['rate'] = $db->query('
            SELECT rate FROM singer
            JOIN serviceprovider ON serviceprovider.sp_id = singer.sp_id
            WHERE serviceprovider.user_id = :user_id
            ', ['user_id' => Auth::getUser_id()])[0]->rate;

            // Query to get the total views of the ads owned by this user
            // They will be automatically ordered based on the id which is an auto incremented field

            $ad_views = new Ad_view();
            $data['views'] = $ad_views->where(['user_id' => Auth::getUser_id()]) ?: 0;
            if($data['views']) $data['views'] = json_encode($data['views']);

            $this->view('common/reports/stats', $data);
        } else {


// Create PDF object
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();

// Advertisements Stats
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,10,'Advertisements Stats',0,1);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,10,'Active Advertisement Count: ' . $stats->active_ad_count,0,1);
            $pdf->Cell(0,10,'Pending Advertisement Count: ' . $stats->pending_ad_count,0,1);
            $pdf->Cell(0,10,'Total Advertisement Count: ' . $stats->total_ad_count,0,1);

// Estimated Earnings (if user type is singer)
            if($_SESSION['USER_DATA']->user_type == 'singer') {
                $pdf->Ln(10); // Add some space between sections
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,10,'Estimated Earnings',0,1);
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(0,10,'User\'s Average Rate: LKR ' . number_format($rate, 2),0,1);
                $pdf->Cell(0,10,'Expected earning from the accepted reservations: LKR ' . number_format(($stats->accepted_request_count ?? 0) * $rate, 2),0,1);
                $pdf->Cell(0,10,'Earning from the completed reservations: LKR ' . number_format(($stats->request_count - ($stats->pending_request_count + $stats->accepted_request_count) ) * $rate, 2),0,1);
            }

// Output PDF
            $pdf->Output();
        }

    }
}
