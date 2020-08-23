import http from "./index";

export const getPhotosCategories = () =>
  http.get("/photos/categories").then((res) => res.data);

export const fetchPhotos = (catID, subCatID, page) =>
  http
    .get("/photos", {
      params: {
        cat: catID,
        "sub-cat": subCatID,
        page,
      },
    })
    .then((res) => res.data);

export const fetchPhoto = (slug) =>
  http.get(`/photo/${slug}`).then((res) => res.data);
