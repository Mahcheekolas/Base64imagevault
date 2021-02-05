# Base64imagevault
A basic php based image uploader which also saves the image contents Base64 value to a database.  Upload allows for varies types of images to a database of its extracted base64 string value along with file type and optional labels. 

Currently improving on the paged results viewer which decodes the images back from Base64.

Getting Started

1. Execute db.sql against a msql database
2. Update user and password values is config.php
3. Upload all files to a web directory.
4. Create an uploads/ directory. (For capturing a hard copy of the upload prior to base64 extraction)
5. Access index.html or uploadFiles.php to being building your datastore or base64 image data.
