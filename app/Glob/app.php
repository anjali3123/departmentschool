<?php


    function viewdate($date)
    {
        try {
            return (strtotime($date) == false) ? '' : (date("m/d/Y", strtotime($date)));
        } catch (\RuntimeException $e) {
            return false;
        }
    }


