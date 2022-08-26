async function getPosts() {
  let res = await fetch("/test_api/api/posts");
  let posts = await res.json();

  document.querySelector(".table-group-divider").innerHTML = "";

  posts.forEach((post) => {
    document.querySelector(".table-group-divider").innerHTML += `
    <th scope="row">${post.id}</th>
    <td>${post.fullname}</td>
    <td>${post.company}</td>
    <td>${post.telephone}</td>
    <td>${post.email}</td>
    <td>${post.dob}</td>
    <td><img width='150' height='150' src="data:image/jpg;base64,${post.photo}" class="img-thumbnail""</td>
    <td><a href="#" class="card-link" onclick="removePost(${post.id})">Удалить</a></td>
    `;
  });
}

async function addPost() {
  const fullname = document.getElementById("fullname").value,
    company = document.getElementById("company").value,
    telephone = document.getElementById("telephone").value,
    email = document.getElementById("email").value,
    dob = document.getElementById("dob").value,
    photo = document.getElementById("photo").value;

  let formData = new FormData();
  formData.append("fullname", fullname);
  formData.append("company", company);
  formData.append("telephone", telephone);
  formData.append("email", email);
  formData.append("dob", dob);
  formData.append("photo", photo);

  const res = await fetch("/test_api/api/posts", {
    method: "POST",
    body: formData,
  });

  const data = await res.json();

  if (data.status) await getPosts();
}

async function removePost(id) {
  const res = await fetch(`/test_api/api/posts/${id}`, {
    method: "DELETE",
  });

  const data = await res.json();

  if (data.status) await getPosts();
}
getPosts();
