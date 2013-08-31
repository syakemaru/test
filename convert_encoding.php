<?php
if($argc < 2){
  echo "useage: php convert_encoding.php <inputfile> <outputfile>\n";
  echo "if you didn't give the <outputfile>, you'll get 'output.txt'.\n";
}else{
  echo "input encode before converted. ex: sjis utf8 euc-jp\ndefault: sjis\n";
  $before = fgets(STDIN,4096);
  if($before){
    $before='sjis';
  }
  echo "input encode after converted.\ndefault: utf8\n";
  $after = fgets(STDIN,4096);
  if($after){
    $after='utf8';
  }
  
  $input = $argv[1];
  $output = "output.txt";
  if($argc >= 3){
    $output = $argv[2];
  }

  $fpr = fopen($input, "r");
  $fpw = fopen($output, "w");
  while ($line = fgets($fpr)) {
    $convert=mb_convert_encoding($line, $after, $before);
    fwrite($fpw, $convert);
  }
  fclose($fpr);
  fclose($fpw);
}

