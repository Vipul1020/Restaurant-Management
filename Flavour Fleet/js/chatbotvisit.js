(function() {
    // Define variables
    var js, fs, d = document,
        id = "tars-widget-script",
        b = "https://tars-file-upload.s3.amazonaws.com/bulb/";

    // Check if the script element with id "tars-widget-script" already exists
    if (!d.getElementById(id)) {
        // If not, create a new script element
        js = d.createElement("script");
        js.id = id;
        js.type = "text/javascript";
        // Set the source attribute to a JavaScript file hosted on Amazon S3
        js.src = b + "js/widget.js";
        // Get the first script element in the document
        fs = d.getElementsByTagName("script")[0];
        // Insert the newly created script element before the first script element
        fs.parentNode.insertBefore(js, fs)
    }
})();

// Set global tarsSettings object with "convid" property
window.tarsSettings = {
    "convid": "HE7m99"
};
