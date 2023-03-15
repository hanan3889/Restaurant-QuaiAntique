// //Récupérer le formulaire;

// const watchSubmit = () => {
//   const form = document.querySelector(".form");
//   form.addEventListener("submit", (event) => {
//     event.preventDefault();
//     const formData = new FormData(form);
//     backcall(formData);
//   });
// };
// //-Les envoyer au back
// const backcall = (dataTosend) => {
//   console.log("dataToSend", dataTosend);
//   fetch("http://127.0.0.1:8000/reservationAPI", {
//     body: dataTosend,
//   }),
//     then((response) => response.json),
//     then((data) => {
//       console.log("data", data);
//     });
// };

// //Ajouter un écouteur d'evenement sur le clic;
// form.addEventListener("submit", (event) => {
//   //Empêcher l'envoi par défaut du formulaire
//   event.preventDefault();
// });

// console.log("je suis le formulaire");
