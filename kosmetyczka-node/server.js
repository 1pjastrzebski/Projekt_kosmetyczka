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
    user : null,
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
        req.session.user = {
          imie : imie,
          nazwisko : nazwisko,
          email : email,
          plec : plec,
        }
        res.redirect("/");
      }else{
        res.send("Nie prawidlowy email lub hasło");
        res.send(email,password)
      }
      res.end();
    });
  }else{
    res.send('nie działa')
    res.end()
  }
});
app.post("/sign",function (req,res){
  let imie = req.body.Imie;
  let nazwisko = req.body.Nazwisko;
  let email = req.body.email;
  let plec = req.body.plec;
  let haslo = req.body.haslo;
  let phaslo = req.body.phaslo;
  if(imie && nazwisko && email && plec && haslo && phaslo){
    if(haslo == phaslo){
     $sql = `INSERT INTO klienci VALUES(null,${imie},${nazwisko},${email},${plec},${haslo})`;
     con.query($sql,function(err,results){
      if (err) throw err;
      req.session.loggedin = true;
      req.session.user = {
        imie : imie,
        nazwisko : nazwisko,
        email : email,
        plec : plec,
      }
      res.redirect("/")
     })
    }else{
      req.session.log_err = "Podane hasła różnią się";
      res.redirect('/sing-form')
    }
  }
})
app.post("/logout",function (req,res){
  req.session.loggedin = false;
  res.redirect("/");
})
app.get("/", (req, res) => {
  res.render(__dirname + "/views/index.ejs", {loggedin : req.session.loggedin, user : req.session.user});
});
app.get("/log-form", (req, res) => {
  res.render(__dirname + "/views/log-form.ejs");
});
app.get("/sign-form", (req,res) => {
  res.render(__dirname + "/views/sign-form.ejs")
})

app.listen(port, function (err) {
    if(err) throw err;
    console.log(port)
    
});
