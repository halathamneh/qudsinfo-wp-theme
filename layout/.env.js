const localUrl = "https://qudsinfo.test";
// const stagingUrl = 'https://staging.qudsinfo.com';
const prodUrl = "https://qudsinfo.com";

const localToken =
  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvcXVkc2luZm8udGVzdCIsImlhdCI6MTU4Nzk4Mjg0MCwibmJmIjoxNTg3OTgyODQwLCJleHAiOjE5MDMzNDI4NDAsImRhdGEiOnsidXNlciI6eyJpZCI6IjEifX19.2Qoo0pF_JAxYEjpMw8HUYZx_IkGb0JIYH25uIqIMN30";
// const stagingToken = '';
const prodToken =
  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvcXVkc2luZm8uY29tIiwiaWF0IjoxNTg4NDYwODk1LCJuYmYiOjE1ODg0NjA4OTUsImV4cCI6MTkwMzgyMDg5NSwiZGF0YSI6eyJ1c2VyIjp7ImlkIjoiMSJ9fX0.JVZlFz7pt5FaAIEfKinqrVgaKXeFDtvrbzPq6y__p8Y";

module.exports = (env) => {
  const out = {
    NODE_ENV: env,
  };
  if (env === "development") {
    out["remoteHost"] = localUrl;
    out["apiToken"] = localToken;
  } else if (env === "production") {
    out["remoteHost"] = prodUrl;
    out["apiToken"] = prodToken;
  }
  return {
    "process.env": JSON.stringify(out),
  };
};
