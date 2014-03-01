<?php

move_uploaded_file($_FILES['blob']['tmp_name'], 'upload/'.$_FILES['blob']['name'].'.wav');

echo 'Uploaded: '.$_FILES['blob']['name'].'.wav at public/upload';