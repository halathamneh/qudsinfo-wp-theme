import http from './index';

export const getTerms = () =>
  http.get('/terms/knowquds').then((res) => res.data);

export const getTermDetails = (term) =>
  http.get(`/knowquds/category/${term}`).then((res) => res.data);

export const getPostDetails = (postId) =>
  http.get(`/knowquds/item/${postId}`).then((res) => res.data);
