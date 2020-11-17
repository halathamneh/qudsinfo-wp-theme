import http from "./index";

const formatReceivedCategory = (category) => {
  const out = {
    id: category.id,
    slug: category.slug,
    label: category.label,
    to: `/category/${category.slug}`,
  };
  if (category.children && category.children.length > 0) {
    out.children = category.children.map((child) =>
      formatReceivedCategory(child)
    );
  }
  return out;
};

export const getCategories = () => {
  return http
    .get("/terms/category")
    .then((res) => res.data.map((cat) => formatReceivedCategory(cat)));
};

export const getCategoryDetails = (slug) => {
  const url = String.format("/term/{0}", slug);
  return http.get(url).then((res) => res.data);
};

export const getCategoryInfos = (slug) => {
  const url = String.format("/infos/{0}", slug);
  return http.get(url).then((res) => res.data);
};
