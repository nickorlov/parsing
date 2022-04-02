<?php

use App\Parsing\Parse;

require_once __DIR__ . '/../vendor/autoload.php';

$textToParse = '📦📦  LOAD POST 📦📦
Pro Moving & Storage  

       From CA 92705: 


TN  37087  1200
CA  92231  400
FL  32720  900
FL  32826  2800
AZ  85873  1000
CA  95050  800
NE  68526  350
NE  68132  450
WI  53115  286
FL  32901  850
FL  34741  1800
FL  33326  195
IL  60610  250
NC  27302  100
AR  729560  600
SC  29910  300

       From OR 97402: 



AR  72762  530
IL  62034  840
CA  94598  400
MT  59101  1800
NV  89128  300
MO  65802  630
FL  33334  300
AL  35055  800
ID  83706  400
CT  6095  350
FL  32309  400
IL  60647  300
GA  31305  1500

Call Or Text :
949-545-3315 Sam';

$parse = new Parse();
$parse->parse($textToParse);
