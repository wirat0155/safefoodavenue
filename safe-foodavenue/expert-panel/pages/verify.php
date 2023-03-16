<?php
function verify($imageName) {
    // safe
    if (intval(substr($imageName, -5)) % 2 == 0) {
        $result = array(
        'formalin(mg/kg)' => 0.1,
        'Centroid1' => [80, 68],
        'Centroid2' => [62, 176],
        'Radius1' => '22',
        'Radius2' => '12',
        );
    }
    // danger
    else {
        $result = array(
            'formalin(mg/kg)' => 0.7,
            'Centroid1' => [85, 67],
            'Centroid2' => [60, 180],
            'Radius1' => '22',
            'Radius2' => '23',
        );
    }
    return $result;
}
?>