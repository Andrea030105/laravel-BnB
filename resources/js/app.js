import "./bootstrap";
import "~resources/scss/app.scss";
import "~icons/bootstrap-icons.scss";
import * as bootstrap from "bootstrap";
import axios from "axios";
import.meta.glob(["../img/**"]);

const addressInput = document.getElementById("address");

if (addressInput) {
    addressInput.addEventListener("blur", async function () {
        const address = this.value.trim();
        if (!address) return;

        try {
            const response = await axios.get("/admin/geocode", {
                params: { address },
            });

            document.getElementById("latitude").value = response.data.lat;
            document.getElementById("longitude").value = response.data.lon;

            console.log(
                "✅ Lat:",
                response.data.lat,
                "Lon:",
                response.data.lon,
            );
        } catch (error) {
            console.error("Indirizzo non trovato");
        }
    });
}
