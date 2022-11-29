import "./bootstrap";
import Dropzone from "dropzone";

if (document.querySelector("#dropzone")) {
    Dropzone.autoDiscover = true;
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: "Sube tu imagen",
        acceptedFiles: ".png, .jpg, .jpeg, .gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar Archivo",
        maxFiles: 1,
        uploadMultiple: false,

        init: function () {
            if (document.querySelector('[name="imagen"]').value.trim()) {
                const imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = document
                    .querySelector('[name="imagen"]')
                    .value.trim();

                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(
                    this,
                    imagenPublicada,
                    `/uploads/${imagenPublicada.name}`
                );

                imagenPublicada.previewElement.classList.add(
                    "dz-success",
                    "dz-complete"
                );
            }
        },
    });

    dropzone.on("success", (_, { imagen }) => {
        document.querySelector('[name="imagen"]').value = imagen;
    });

    dropzone.on("removedfile", () => {
        document.querySelector('[name="imagen"]').value = "";
    });
}
