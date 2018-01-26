
function favoriteCard(id) {

    //Create new last card
    var newCard = document.createElement("sectiom");
    newCard.classList.add("card");
    newCard.setAttribute("id", id.toString());

    var content = document.createElement("article");
    var pSection = document.createElement("p");

    var newP = document.createElement("button");
    var icon  = document.createElement("i");
    icon.classList.add("fa");
    icon.classList.add("fa-trash");
    newP.addEventListener("click", function () {
        var toDelete = document.getElementById(id);
        if(toDelete){
            toDelete.remove();
        }
    });
    newP.appendChild(icon);
    pSection.appendChild(newP);


    icon = document.createElement("i");
    icon.classList.add("fa");
    icon.classList.add("fa-phone");
    pSection.appendChild(icon);

    var link = document.createElement("a");
    link.href = '#';
    var imageIcon = document.createElement("img");
    imageIcon.src = 'images/calander-blue.png';
    link.appendChild(imageIcon);
    pSection.appendChild(link);
    content.appendChild(pSection);

    pSection = document.createElement("p");
    pSection.classList.add("name");
    pSection.appendChild(
        document.createTextNode("Noga No." + id.toString())
    );
    content.appendChild(pSection);

    imageIcon = document.createElement("img");
    imageIcon.classList.add("card-img-top");
    imageIcon.src = "images/Image%201.png";
    content.appendChild(imageIcon);

    pSection = document.createElement("p");
    pSection.classList.add("description");
    imageIcon = document.createElement("img");
    imageIcon.src = "images/location-icon.png";
    pSection.appendChild(imageIcon);
    pSection.appendChild(
        document.createTextNode(" Anna Frank st. Tel Aviv, Israel")
    );
    content.appendChild(pSection);

    pSection = document.createElement("p");
    pSection.classList.add("description");
    imageIcon = document.createElement("img");
    imageIcon.src = "images/calendar-small-blue.png";
    pSection.appendChild(imageIcon);
    pSection.appendChild(
        document.createTextNode(" 01/07/2017 - 01/08/2017")
    );
    content.appendChild(pSection);

    pSection = document.createElement("p");
    pSection.classList.add("description");
    imageIcon = document.createElement("img");
    imageIcon.src = "images/foot-blue-small.png";
    pSection.appendChild(imageIcon);
    var spann = document.createElement("span");
    spann.appendChild(
        document.createTextNode(" 2 dogs")
    );
    pSection.appendChild(spann);
    content.appendChild(pSection);

    var anotherDiv  = document.createElement("div");
    anotherDiv.classList.add("card-body");

    newCard.appendChild(content);


    document.getElementById("favorites").appendChild(newCard);
}


for (var i = 0 ; i < 7 ; ++i) {
    favoriteCard(i);
}




