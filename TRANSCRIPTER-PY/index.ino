client.println("<!DOCTYPE html>");

client.println("<html lang='en'>");

client.println("<head>");

client.println("<meta charset='UTF-8'>");

client.println("<meta name='viewport' content='width=device-width, initial-scale=1.0'>");

client.println("<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>");

client.println("<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' integrity='sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=' crossorigin='anonymous' />");

client.println("<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>");

client.println("<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>");

client.println("<title>BUZZER CONTROL</title>");

client.println("<style>");

client.println("body");

client.println("{");

client.println("margin: 0;");

client.println("padding: 0;");

client.println("box-sizing: border-box;");

client.println("font-family: 'Poppins', sans-serif;");

client.println("background-color: #1c2238;");

client.println("}");

client.println(".main-title");

client.println("{");

client.println("color: #c8d0f2;");

client.println("text-align: center;");

client.println("border-bottom: 2px solid;");

client.println("border-image-source: linear-gradient(45deg, #3498DB, #DC7633);");

client.println("border-image-slice: 1;");

client.println("margin-left: 50px;");

client.println("margin-right: 50px;");

client.println("width: auto;");

client.println("padding-bottom: 10px;");

client.println("padding-top: 15px;");

client.println("letter-spacing: 2px;");

client.println("}");

client.println(".wrapper");

client.println("{");

client.println("text-align: center;");

client.println("margin-top: 100px;");

client.println("}");

client.println(".wrapper a");

client.println("{");

client.println("background-color: #3498DB;");

client.println("padding: 10px;");

client.println("}");

client.println(".wrapper a button");

client.println("{");

client.println("border: none;");

client.println("background-color: #3498DB;");

client.println("color: white;");

client.println("}");

client.println(".wrapper a:hover");

client.println("{");

client.println("background-color: #2E86C1!important;");

client.println("}");

client.println("</style>");

client.println("</head>");

client.println("<body>");

client.println("<div class='container-fluid main-div'>");

client.println("<div class='main-title'>");

client.println("<h1>RCI - Project => Ajout d'un robot</h1>");

client.println("</div>");

client.println("<div class='wrapper'>");

client.println("<a class='btn' id='one' href=\"/ACTION=ONE\"\><button>ONE</button></a>");

client.println("<a class='btn' id='two' href=\"/ACTION=TWO\"\><button>TWO</button></a>");

client.println("<a class='btn' id='three' href=\"/ACTION=THREE\"\><button>THREE</button></a>");

client.println("<a class='btn' id='four' href=\"/ACTION=FOUR\"\><button>FOUR</button></a>");

client.println("</div>");

client.println("</div>");

client.println("</body>");

client.println("</html>");

