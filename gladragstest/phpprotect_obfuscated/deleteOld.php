<?php
include_once 'connect.php';

$Vfn403grgrvr = new mysqli($Vld2n41m23g2,$V3mnfj23ef1g,$Vggk1tlk5vss,$Vgxg2ndfh0tn);
$Vsznhu5tkhyv="CREATE EVENT removeOldContent ON SCHEDULE EVERY 1 HOUR DO DELETE FROM images WHERE date<=NOW();"
if ($Vfn403grgrvr->query($Vsznhu5tkhyv) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $Vfn403grgrvr->error;
}
?>