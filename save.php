<?php



if (isset($GLOBALS['HTTP_RAW_POST_DATA']))
{
	
		// Get the data

		$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];	
        $name = substr($imageData, -5);

		// Remove the headers (data:,) part.
		// A real application should use them according to needs such as to check image type
		$filteredData=substr($imageData, strpos($imageData, ",")+1);
	
		// Need to decode before saving since the data we received is already base64 encoded
		$unencodedData=base64_decode($filteredData);

		//echo "unencodedData".$unencodedData;

		// Save file. This example uses a hard coded filename for testing,
		// but a real application can specify filename in POST variable

		$fp = fopen( "../../uploads/PDS/" . $name ."_PDS.png", 'wb' );
		fwrite( $fp, $unencodedData);
		fclose( $fp );
		echo $name."_PDS.png";
}