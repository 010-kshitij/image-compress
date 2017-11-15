function ImageCompress(params) {
    var instance = this;

    instance.fileElement = document.querySelector(params.fileToCompress);
    instance.imageElement = document.querySelector(params.imageForPreview);

    instance.fileElement.onchange = function() {
        console.log("Image Changed.");
    };

    instance.previewImage = function() {
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            instance.imageElement.setAttribute("src", event.target.result)
        };
        fileReader.readAsDataURL(instance.fileElement.files[0]);
    };

    instance.compress = function(quality, outputFormat) {
        // Getting source file object.
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            var sourceImageElement = new Image();
            sourceImageElement.src = event.target.result;

            // Compress Image
            var MIME_type = "image/jpeg";
            if(typeof outputFormat !== "undefined" && outputFormat=="png") {
                MIME_type = "image/png";
            }

            var canvas = document.createElement('canvas');
            canvas.width = sourceImageElement.naturalWidth;
            canvas.height = sourceImageElement.naturalHeight;
            var context = canvas.getContext("2d").drawImage(sourceImageElement, 0, 0);
            var newImageData = canvas.toDataURL(MIME_type, quality/100);

            // var outputFile = new Image();
            // outputFile.src = newImageData;

            var outputFile = canvas.toBlob(function(){}, MIME_type, quality/100);

            return outputFile;
        };
        fileReader.readAsDataURL(instance.fileElement.files[0]);
    };
}