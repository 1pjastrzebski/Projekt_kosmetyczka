const express = require("express");
const port = 3000;
const path = require("path");
const mysql = require("mysql");
const session = require("express-session");
const app = express();

let con = mysql.createConnection({
  host: "localhost",
  user: "kosmetyczka",
  password: "haslo",
  database: "kosmetyczka",
});
con.connect(function(err){
    if (err) throw err;
    console.log("connected")
})
app.set("view engine", "ejs");

app.use(
  session({
    secret: 'secret',
    resave : true,
    saveUninitialized: true,
    loggedin: false,
  })
);
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "static")));

app.use(express.static("public"));
app.post("/log", function (req, res) {
  let email = req.body.email;
  let password = req.body.haslo;
  if (email && password) {
    let sql = "SELECT * FROM klienci where email = ? and haslo = ?";
    con.query(sql, [email, password], function (error, results) {
      if (error) throw error;
      if (results.length > 0) {
        req.session.loggedin = true;
        req.session.email = email;
        res.redirect("/index");
      }else{
        res.send("<div class='form-error-text'>Nieprawidłowy email lub hasło</div>")
      }
      res.end();
    });
  }else{
    res.send('nie działa')
    res.end()
  }
});
app.get("/", (req, res) => {
  res.render(__dirname + "/views/index.ejs");
});
app.get("/log-form", (req, res) => {
  res.render(__dirname + "/views/log-form.ejs");
});

app.listen(port, function (err) {
    if(err) throw err;
    console.log(port)
    
});
