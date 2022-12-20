<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require('server.php'); 
if (!isset($_SESSION['UserID'])) {
  header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/styles/style.css" />
    <link rel="stylesheet" href="assets/styles/flickitydot.css" />

    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </head>
  <body>
    <div class="pageA mt-3">
      
        <div class="col-sm-3"style="width:275px; height:796px; background-color: #fff; border-radius: 35px 0 0 35px" >
          <img src="user.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px; border-radius: 50%; padding: 1px; margin-top: 40px; margin-left: 95px; box-shadow: -0px 10px 17px rgb(197, 199, 207);" alt="user profile">
          <div class="text" style="margin-left: 8px; width: 100%;">
              <p style="font-size: 20px; margin-top: 7px; font-weight: 510; margin-left: 70px;"><?php echo $_SESSION['Username'] ?></p>
              <p class="small-text" style="font-size: 13px; margin-left: 62px;"><?php echo $_SESSION['Email'] ?></p>
          </div>
          <div class="menu" style="margin-top: 25px;">
            <ul>
              <p><i class="bi bi-house icon" style="margin-bottom: 5px;"></i>HOME</p>
              <li>
                <a href="#home" onclick="openHome()" style="margin-bottom: 5px;">
                  <label style="margin-left: 60px;"></label>
                    HOME
                </a>
              </li>
              <p><i class="bi bi-music-note-list icon" style="margin-right: 10px; margin-bottom: 5px;"></i>PLAYLISTS</p>
              <li>
                <!-- <a href="">
                  <label style="margin-left: 60px;"></label>
                  New Playlist
                </a> -->
                <a href="#MyPlaylists" onclick="openMP()">
                  <label style="margin-left: 60px;"></label>
                  My Playlists
                </a>
                <a href="#ByMusicPlayer" onclick="openBM()" style="margin-bottom: 10px;">
                  <label style="margin-left: 60px;"></label>
                  By Music Player
                </a>
              </li>
              <p><i class="bi bi-collection-play icon" style="margin-right: 10px; margin-bottom: 5px;"></i>KARAOKE</p>
              <li>
                <a href="#KaraokeMode_MyPlaylists" onclick="openKaraokeMP()">
                  <label style="margin-left: 60px;"></label>
                  My Playlists
                </a>
                <a href="#KaraokeMode_ByMusicPlayer" onclick="openKaraokeBM()">
                  <label style="margin-left: 60px;"></label>
                  By Music Player
                </a>
              </li>
            </ul>
            <label class="small-text" style="font-size: 13px; color: rgb(162, 162, 162); margin-top: 198px; margin-left: 60px;">Music Player by SW Team Co.</label>
          </div>
        </div>
        <div class="col-sm-8">
          <nav class="navbar navbar-expand-sm" style="width: 1020px; height: 95px; border-radius: 0 35px 0 0;">
            <div class="container-fluid">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" style=" width: 400px; height: 43px; border: 2px solid rgb(227, 227, 227); color: rgb(75, 75, 75); border-radius: 30px; align-items: center; display: flex; padding: 7px; margin-top: 7px; margin-left: 30px; float: inline-start;">
                    <i class="bi-search" aria-hidden="true" style="font-size: 17px; margin-left: 15px; margin-right: 13px;"></i>
                    <input type="small-text" placeholder="Search for song, artists.." style="border: none; outline: none; font-size: 13px;">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="margin-top: 10px ; margin-left: 370px; margin-right: 10px; font-size: 20px;  color: rgb(155, 155, 155); ">
                    <i class="bi bi-bell"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="margin-top: 10px; margin-right: 10px; font-size: 20px; color: rgb(155, 155, 155); ">
                    <i class="bi bi-gear"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn" style="margin-top: 10px; font-size: 15px; width: 100px; height: 40px; background-color: rgb(255, 115, 100); border: 1px solid #eee; border-radius: 25px; color:#fff;" onclick="location.href='Logout.php';">Log out</button>
                </li>
              </ul>
            </div>
          </nav>
          <div class="box" style="width: 1021px; height:700px; border-radius: 0 0 35px 0;">
              <div class="row">
                <div class="box" id="home" style="width:700px; height: 700px; display: block;">
                  <div class="box" style="width: 700px; height:320px;">
                  <div><h1 style="font-size: 30px; font-weight:700; margin-left: 20px; margin-bottom: 10px;">Top 10 Poppular Playlists</h1></div>
                    <div class="main-carousel" data-flickity='{ "groupCells": true }'>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\midnigth.jpg" onclick="openTaylor()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">Midnigth</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Taylor Swift</h3> 
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\Harry's_House.png" onclick="openHarry()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">Harry's House</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Harry Style</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\Positions.png" onclick="openAriana()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">Positions</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Ariana Grande</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\The.png" onclick="openBlackpink()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">The Album</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">BLACKPINK</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\TheHighlights.png" onclick="openTheweekend()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">The Highlights</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">The Weekend</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\PlanetHer.png" onclick="openDoja()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">Planet Her</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Doja Cat</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\SOUR.png" onclick="openOlivia()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">SOUR</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Olivia Rodrigo</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\beOK.jpg" onclick="openTilly()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">It's Gonna Be OK</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Tilly Birds</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\thesecond.jpg" onclick="openTreasure()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">The Second Step</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">TREASURE</h3>
                        </div>
                      </div>
                      <div class="cell">
                        <div id="coverpic">
                          <img src="assets\images\22.jpg" onclick="openJoji()" class="center" style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;">
                        </div>
                        <div id="board">
                          <h2 style="font-size: 16px; margin-top: 12px; margin-left: 30px;">Smithereens</h2>
                          <h3 class="small-text" style="font-size: 13px; margin-left: 30px;">Joji</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Playlists top10 -->

                  <!-- Start of taylor -->
                  <div class="box" id="Taylor" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Midnight - Taylor Swift</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/41.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Lavender Haze</h3>
                            <h5>Taylor Swift</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="41" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/42.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Maroon</h3>
                              <h5>Taylor Swift</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="42" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/43.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>Anti-Hero</h3>
                                <h5>Taylor Swift</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="43" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/44.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Snow On The Beach</h3>
                                  <h5>Taylor Swift ft.Lana</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="44" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/45.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>You're On Your Own, Kid</h3>
                                    <h5>Taylor Swift</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="45" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/46.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>Midnight Rain</h3>
                                      <h5>Taylor Swift</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="46" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/47.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>Question...?</h3>
                                        <h5>Taylor Swift</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="47" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/48.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>Vigilante Shit</h3>
                                          <h5>Taylor Swift</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="48" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/49.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>Bejeweled</h3>
                                            <h5>Taylor Swift</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="49" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/50.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>Labyrinth</h3>
                                              <h5>Taylor Swift</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="50" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/51.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>Karma</h3>
                                                <h5>Taylor Swift</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="51" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>

                                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                              <div class="row">
                                                <div class="box" style="width: 70px; height: 55px;">
                                                  <img src="assets/images/52.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                </div>
                                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                  <h3>Sweet Noting</h3>
                                                  <h5>Taylor Swift</h5>
                                                </div>
                                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                  <i class="bi playListPlay bi-play-circle" id="52" style="font-size: 30px; cursor: pointer;"></i>
                                                </div>      
                                              </div>
                                              </div>

                                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                <div class="row">
                                                  <div class="box" style="width: 70px; height: 55px;">
                                                    <img src="assets/images/53.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                  </div>
                                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                    <h3>Mastermind</h3>
                                                    <h5>Taylor Swift</h5>
                                                  </div>
                                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                    <i class="bi playListPlay bi-play-circle" id="53" style="font-size: 30px; cursor: pointer;"></i>
                                                  </div>      
                                                </div>
                                                </div>
                          
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of taylor -->

                  <!-- Start of harry -->
                  <div class="box" id="Harry" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Harry's House - Harry Style</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/54.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Music For a Sushi Restaurant</h3>
                            <h5>Harry Styles</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="54" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/55.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Late Night Talking</h3>
                              <h5>Harry Styles</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="55" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/56.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>Grapejuice</h3>
                                <h5>Harry Styles</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="56" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/57.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>As It Was</h3>
                                  <h5>Harry Styles</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="57" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/58.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>Daylight</h3>
                                    <h5>Harry Styles</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="58" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/59.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>Little Freak</h3>
                                      <h5>Harry Styles</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="59" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/60.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>Matilda</h3>
                                        <h5>Harry Styles</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="60" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/61.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>Cinema</h3>
                                          <h5>Harry Styles</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="61" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/62.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>Daydreaming</h3>
                                            <h5>Harry Styles</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="62" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/63.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>Keep Driving</h3>
                                              <h5>Harry Styles</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="63" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/64.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>Satellite</h3>
                                                <h5>Harry Styles</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="64" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>

                                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                              <div class="row">
                                                <div class="box" style="width: 70px; height: 55px;">
                                                  <img src="assets/images/65.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                </div>
                                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                  <h3>Boyfriends</h3>
                                                  <h5>Harry Styles</h5>
                                                </div>
                                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                  <i class="bi playListPlay bi-play-circle" id="65" style="font-size: 30px; cursor: pointer;"></i>
                                                </div>      
                                              </div>
                                              </div>

                                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                <div class="row">
                                                  <div class="box" style="width: 70px; height: 55px;">
                                                    <img src="assets/images/66.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                  </div>
                                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                    <h3>Love Of My Life</h3>
                                                    <h5>Harry Styles</h5>
                                                  </div>
                                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                    <i class="bi playListPlay bi-play-circle" id="66" style="font-size: 30px; cursor: pointer;"></i>
                                                  </div>      
                                                </div>
                                                </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of harry -->

                  <!-- Start of ariana grande -->
                  <div class="box" id="Ariana" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Positions - Ariana Grande</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/67.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>shut up</h3>
                            <h5>Ariana Grande</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="67" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/68.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>34+35</h3>
                              <h5>Ariana Grande</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="68" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/69.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>motive</h3>
                                <h5>Ariana Grande</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="69" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/70.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>just like magic</h3>
                                  <h5>Ariana Grande</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="70" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/71.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>off the table</h3>
                                    <h5>Ariana Grande</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="71" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/72.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>six thirty</h3>
                                      <h5>Ariana Grande</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="72" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/73.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>safety net</h3>
                                        <h5>Ariana Grande</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="73" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/74.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>my hair</h3>
                                          <h5>Ariana Grande</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="74" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/75.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>nasty</h3>
                                            <h5>Ariana Grande</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="75" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/76.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>west side</h3>
                                              <h5>Ariana Grande</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="76" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/77.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>love language</h3>
                                                <h5>Ariana Grande</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="77" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>

                                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                              <div class="row">
                                                <div class="box" style="width: 70px; height: 55px;">
                                                  <img src="assets/images/78.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                </div>
                                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                  <h3>position</h3>
                                                  <h5>Ariana Grande</h5>
                                                </div>
                                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                  <i class="bi playListPlay bi-play-circle" id="78" style="font-size: 30px; cursor: pointer;"></i>
                                                </div>      
                                              </div>
                                              </div>

                                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                <div class="row">
                                                  <div class="box" style="width: 70px; height: 55px;">
                                                    <img src="assets/images/79.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                  </div>
                                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                    <h3>obvious</h3>
                                                    <h5>Ariana Grande</h5>
                                                  </div>
                                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                    <i class="bi playListPlay bi-play-circle" id="79" style="font-size: 30px; cursor: pointer;"></i>
                                                  </div>      
                                                </div>
                                                </div>

                                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                  <div class="row">
                                                    <div class="box" style="width: 70px; height: 55px;">
                                                      <img src="assets/images/80.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                    </div>
                                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                      <h3>pov</h3>
                                                      <h5>Ariana Grande</h5>
                                                    </div>
                                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                      <i class="bi playListPlay bi-play-circle" id="80" style="font-size: 30px; cursor: pointer;"></i>
                                                    </div>      
                                                  </div>
                                                  </div>

                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of ariana grande -->

                  <!-- Start of blackpink -->
                  <div class="box" id="Blackpink" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">The Album- BLACKPINK</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/81.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>How You Like That</h3>
                            <h5>BLACKPINK</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="81" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/82.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Ice Cream</h3>
                              <h5>BLACKPINK</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="82" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/83.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>Pretty Savage</h3>
                                <h5>BLACKPINK</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="83" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/84.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Bet you Wanna</h3>
                                  <h5>BLACKPINK</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="84" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/85.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>Lovesick Girls</h3>
                                    <h5>BLACKPINK</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="85" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/86.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>Crazy Over You</h3>
                                      <h5>BLACKPINK</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="86" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/87.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>Love To Hate Me</h3>
                                        <h5>BLACKPINK</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="87" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/87.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>You Never Know</h3>
                                          <h5>BLACKPINK</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="87" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                    </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of blackpink -->

                  <!-- Start of the weekend -->
                  <div class="box" id="Theweekend" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">The Highlights - The weekend</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/89.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>The Morning</h3>
                            <h5>The Weekend</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="89" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/90.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Die For You</h3>
                              <h5>The Weekend</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="90" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/91.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>Acquainted</h3>
                                <h5>The Weekend</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="91" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/92.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Save Your Tears</h3>
                                  <h5>The Weekend</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="92" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/93.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>Blinding Lights</h3>
                                    <h5>The Weekend</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="93" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/94.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>In Your Eyes</h3>
                                      <h5>The Weekend</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="94" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/95.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>Can't Feel My Face</h3>
                                        <h5>The Weekend</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="95" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/96.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>I Feel It Coming</h3>
                                          <h5>The Weekend</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="96" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/97.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>Starboy</h3>
                                            <h5>The Weekend</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="97" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/98.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>Pray For Me</h3>
                                              <h5>The Weekend</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="98" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/99.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>Heartless</h3>
                                                <h5>The Weekend</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="99" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>

                                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                              <div class="row">
                                                <div class="box" style="width: 70px; height: 55px;">
                                                  <img src="assets/images/100.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                </div>
                                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                  <h3>Often</h3>
                                                  <h5>The Weekend</h5>
                                                </div>
                                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                  <i class="bi playListPlay bi-play-circle" id="100" style="font-size: 30px; cursor: pointer;"></i>
                                                </div>      
                                              </div>
                                              </div>

                                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                <div class="row">
                                                  <div class="box" style="width: 70px; height: 55px;">
                                                    <img src="assets/images/101.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                  </div>
                                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                    <h3>The Hills</h3>
                                                    <h5>The Weekend</h5>
                                                  </div>
                                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                    <i class="bi playListPlay bi-play-circle" id="101" style="font-size: 30px; cursor: pointer;"></i>
                                                  </div>      
                                                </div>
                                                </div>

                                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                  <div class="row">
                                                    <div class="box" style="width: 70px; height: 55px;">
                                                      <img src="assets/images/102.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                    </div>
                                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                      <h3>Call Out My Name</h3>
                                                      <h5>The Weekend</h5>
                                                    </div>
                                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                      <i class="bi playListPlay bi-play-circle" id="102" style="font-size: 30px; cursor: pointer;"></i>
                                                    </div>      
                                                  </div>
                                                  </div>

                                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                    <div class="row">
                                                      <div class="box" style="width: 70px; height: 55px;">
                                                        <img src="assets/images/103.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                      </div>
                                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                        <h3>Earned It</h3>
                                                        <h5>The Weekend</h5>
                                                      </div>
                                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                        <i class="bi playListPlay bi-play-circle" id="103" style="font-size: 30px; cursor: pointer;"></i>
                                                      </div>      
                                                    </div>
                                                    </div>

                                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                      <div class="row">
                                                        <div class="box" style="width: 70px; height: 55px;">
                                                          <img src="assets/images/104.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                        </div>
                                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                          <h3>Love Me Harder</h3>
                                                          <h5>The Weekend</h5>
                                                        </div>
                                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                          <i class="bi playListPlay bi-play-circle" id="104" style="font-size: 30px; cursor: pointer;"></i>
                                                        </div>      
                                                      </div>
                                                      </div>

                                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                        <div class="row">
                                                          <div class="box" style="width: 70px; height: 55px;">
                                                            <img src="assets/images/105.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                          </div>
                                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                            <h3>Wicked Games</h3>
                                                            <h5>The Weekend</h5>
                                                          </div>
                                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                            <i class="bi playListPlay bi-play-circle" id="105" style="font-size: 30px; cursor: pointer;"></i>
                                                          </div>      
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                          <div class="row">
                                                            <div class="box" style="width: 70px; height: 55px;">
                                                              <img src="assets/images/106.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                            </div>
                                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                              <h3>After Hours</h3>
                                                              <h5>The Weekend</h5>
                                                            </div>
                                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                              <i class="bi playListPlay bi-play-circle" id="106" style="font-size: 30px; cursor: pointer;"></i>
                                                            </div>      
                                                          </div>
                                                          </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of the weekend -->

                  <!-- Start of doja cat -->
                  <div class="box" id="Doja" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Planet Her - Doja Cat</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/107.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Woman</h3>
                            <h5>Doja Cat</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="107" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/108.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Naked</h3>
                              <h5>Doja Cat</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="108" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/109.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>PayDay</h3>
                                <h5>Doja Cat</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="109" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/110.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Get Into It</h3>
                                  <h5>Doja Cat</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="110" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/111.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Need To Know</h3>
                                  <h5>Doja Cat</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="111" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/112.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>I Don't Do Drugs</h3>
                                    <h5>Doja Cat</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="112" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/113.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>Love To Dream</h3>
                                      <h5>Doja Cat</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="113" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/114.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>You Right</h3>
                                        <h5>Doja Cat</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="114" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/115.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>Been Like This</h3>
                                          <h5>Doja Cat</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="115" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/116.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>Option</h3>
                                            <h5>Doja Cat ft.JID</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="116" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/116.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>Aint't Shit</h3>
                                              <h5>Doja Cat</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="116" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/118.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>Imagine</h3>
                                                <h5>Doja Cat</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="118" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>

                                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                              <div class="row">
                                                <div class="box" style="width: 70px; height: 55px;">
                                                  <img src="assets/images/119.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                </div>
                                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                  <h3>Alone</h3>
                                                  <h5>Doja Cat</h5>
                                                </div>
                                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                  <i class="bi playListPlay bi-play-circle" id="119" style="font-size: 30px; cursor: pointer;"></i>
                                                </div>      
                                              </div>
                                              </div>

                                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                                <div class="row">
                                                  <div class="box" style="width: 70px; height: 55px;">
                                                    <img src="assets/images/120.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                                  </div>
                                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                    <h3>Kiss Me More</h3>
                                                    <h5>Doja Cat</h5>
                                                  </div>
                                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                    <i class="bi playListPlay bi-play-circle" id="120" style="font-size: 30px; cursor: pointer;"></i>
                                                  </div>      
                                                </div>
                                                </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of doja cat -->

                  <!-- Start of olivia rodrigo-->
                  <div class="box" id="Olivia" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">SOUR - Olivia Rodrigo</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/121.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>brutal</h3>
                            <h5>Olivia Rodrigo</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="121" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/122.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>traitor</h3>
                              <h5>Olivia Rodrigo</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="122" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/123.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>drivers license</h3>
                                <h5>Olivia Rodrigo</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="123" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/124.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>1 step forward, 3 steps back</h3>
                                  <h5>Olivia Rodrigo</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="124" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/125.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>deja vu</h3>
                                    <h5>Olivia Rodrigo</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="125" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/126.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>good 4 u</h3>
                                      <h5>Olivia Rodrigo</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="126" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/127.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>enough for you</h3>
                                        <h5>Olivia Rodrigo</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="127" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/128.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>happier</h3>
                                          <h5>Olivia Rodrigo</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="128" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                                      <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                        <div class="row">
                                          <div class="box" style="width: 70px; height: 55px;">
                                            <img src="assets/images/129.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                          </div>
                                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                            <h3>jealousy, jealousy</h3>
                                            <h5>Olivia Rodrigo</h5>
                                          </div>
                                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                            <i class="bi playListPlay bi-play-circle" id="129" style="font-size: 30px; cursor: pointer;"></i>
                                          </div>      
                                        </div>
                                        </div>

                                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                          <div class="row">
                                            <div class="box" style="width: 70px; height: 55px;">
                                              <img src="assets/images/130.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                            </div>
                                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                              <h3>favorite crime</h3>
                                              <h5>Olivia Rodrigo</h5>
                                            </div>
                                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                              <i class="bi playListPlay bi-play-circle" id="130" style="font-size: 30px; cursor: pointer;"></i>
                                            </div>      
                                          </div>
                                          </div>

                                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                            <div class="row">
                                              <div class="box" style="width: 70px; height: 55px;">
                                                <img src="assets/images/131.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                              </div>
                                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                                <h3>hope ur ok</h3>
                                                <h5>Olivia Rodrigo</h5>
                                              </div>
                                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                                <i class="bi playListPlay bi-play-circle" id="131" style="font-size: 30px; cursor: pointer;"></i>
                                              </div>      
                                            </div>
                                            </div>
                          
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of olivia rodrigo-->

                  <!-- Start of tilly birds -->
                  <div class="box" id="Tilly" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">It's Gonna Be OK - Tilly Birds</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/132.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>เพื่อนเล่น ไม่เล่นเพื่อน</h3>
                            <h5>Tilly Birds ft. MILLI</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="132" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/133.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>ลู่วิ่ง</h3>
                              <h5>Tilly Birds</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="133" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>
                        
                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/134.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>เบื่อคนขี้เบื่อ</h3>
                                <h5>Tilly Birds</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="134" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/135.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>เดอะแบก</h3>
                                  <h5>Tilly Birds</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="135" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/136.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>ติดตรงที่ฉัน</h3>
                                    <h5>Tilly Birds</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="136" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>
  
                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/137.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>ขอให้เธอโชคดี</h3>
                                      <h5>Tilly Birds</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="137" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/138.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>เธอไม่ได้อยู่คนเดียว</h3>
                                        <h5>Tilly Birds</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="138" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/139.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>ถ้าเราเจอกันอีก</h3>
                                          <h5>Tilly Birds</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="139" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>

                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of tilly birds -->

                  <!-- Start of treasure -->
                  <div class="box" id="Treasure" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">The Second Step - Treasure</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/140.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>HELLO</h3>
                            <h5>TREASURE</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="140" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/141.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>VILKNO</h3>
                              <h5>TREASURE</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="141" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/142.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>CLAP!</h3>
                                <h5>TREASURE</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="142" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>

                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/143.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>THANK YOU</h3>
                                  <h5>TREASURE</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="143" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/144.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>HOLD IT IN</h3>
                                    <h5>TREASURE</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="144" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of treasure -->

                  <!-- Start of joji -->
                  <div class="box" id="Joji" style="width: 700px; height:380px; display: none;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Smithereens - Joji</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <!-- Start item in playlist-->
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/145.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Glimpse</h3>
                            <h5>Joji</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="145" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>

                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/146.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Feeling Like The End</h3>
                              <h5>Joji</h5>
                            </div>
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="146" style="font-size: 30px; cursor: pointer;"></i>
                            </div>      
                          </div>
                          </div>

                          <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                            <div class="row">
                              <div class="box" style="width: 70px; height: 55px;">
                                <img src="assets/images/147.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                              </div>
                              <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                <h3>Before The Day Is Over</h3>
                                <h5>Joji</h5>
                              </div>
                              <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                <i class="bi playListPlay bi-play-circle" id="147" style="font-size: 30px; cursor: pointer;"></i>
                              </div>      
                            </div>
                            </div>
                          
                            <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                              <div class="row">
                                <div class="box" style="width: 70px; height: 55px;">
                                  <img src="assets/images/148.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                </div>
                                <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                  <h3>Dissolve</h3>
                                  <h5>Joji</h5>
                                </div>
                                <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                  <i class="bi playListPlay bi-play-circle" id="148" style="font-size: 30px; cursor: pointer;"></i>
                                </div>      
                              </div>
                              </div>

                              <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                <div class="row">
                                  <div class="box" style="width: 70px; height: 55px;">
                                    <img src="assets/images/149.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                  </div>
                                  <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                    <h3>NIGHT RIDER</h3>
                                    <h5>Joji</h5>
                                  </div>
                                  <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                    <i class="bi playListPlay bi-play-circle" id="149" style="font-size: 30px; cursor: pointer;"></i>
                                  </div>      
                                </div>
                                </div>

                                <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                  <div class="row">
                                    <div class="box" style="width: 70px; height: 55px;">
                                      <img src="assets/images/150.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                    </div>
                                    <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                      <h3>BLAHBLAHBLAH DEMO</h3>
                                      <h5>Joji</h5>
                                    </div>
                                    <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                      <i class="bi playListPlay bi-play-circle" id="150" style="font-size: 30px; cursor: pointer;"></i>
                                    </div>      
                                  </div>
                                  </div>

                                  <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                    <div class="row">
                                      <div class="box" style="width: 70px; height: 55px;">
                                        <img src="assets/images/151.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                      </div>
                                      <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                        <h3>YUKON (INTERLUDE)</h3>
                                        <h5>Joji</h5>
                                      </div>
                                      <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                        <i class="bi playListPlay bi-play-circle" id="151" style="font-size: 30px; cursor: pointer;"></i>
                                      </div>      
                                    </div>
                                    </div>

                                    <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                                      <div class="row">
                                        <div class="box" style="width: 70px; height: 55px;">
                                          <img src="assets/images/152.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                                        </div>
                                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                                          <h3>1AM FREESTYLE</h3>
                                          <h5>Joji</h5>
                                        </div>
                                        <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                                          <i class="bi playListPlay bi-play-circle" id="152" style="font-size: 30px; cursor: pointer;"></i>
                                        </div>      
                                      </div>
                                      </div>
                        
                        <!-- End item in playlist-->
                        
                      </form>
                    </div>
                  </div> 
                  <!-- End of joji -->
                  

                  <!--NEW HOME-->
                  <div class="box" id="Billboard" style="width: 700px; height:380px; display: block;">
                    <div class="box" style="width: 700px; height:380px;">
                      <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">Billboard Top Chart</h2>
                      <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 315px; overflow:auto;">
                        <div class="songItem"  style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/1.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Lavender Haze</h3>
                            <h5>Taylor Swift</h5>
                          </div>
                          <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics11()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div> -->
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                            <i class="bi playListPlay bi-play-circle" id="1" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/15.jpg" class="img-fluid rounded-square" style=" width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Die for You</h3>
                              <h5>The Weekend</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics1()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="15" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>
                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/2.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" id="musicinfoshow" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Kiss Me More</h3>
                              <h5>Doja Cat</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics2()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="2" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>
                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/26.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Roses</h3>
                              <h5>Finn Askew</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics3()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="26" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>

                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/31.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Psycho</h3>
                              <h5>Red Velvet</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics3()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="31" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>

                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/35.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>다라리(DARARI)</h3>
                              <h5>TREASURE</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics3()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="35" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>

                        <div class="songItem" style="width: 620px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                          <div class="row">
                            <div class="box" style="width: 70px; height: 55px;">
                              <img src="assets/images/27.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                            </div>
                            <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                              <h3>Golden Hours</h3>
                              <h5>JVKE</h5>
                            </div>
                            <!-- <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                              <i class="bi bi-list" onclick="myLyrics3()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                            </div> -->
                            <div class="box" style="width: 50px; height:55px; margin-top: 5px; margin-left: 190px;">
                              <i class="bi playListPlay bi-play-circle" id="27" style="font-size: 30px; cursor: pointer;"></i>
                            </div>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                  </div> 
                </div>
                <!-- Start of my playlists -->
                <div class="box" id="MyPlaylists" style="width: 700px; max-height: 700px; display: none;">
                  <div class="box" style="width: 700px; height:395px;">
                    <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">PLAYLISTS - My Playlists</h2>
                    <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 345px; overflow:auto;">
                      <!--Playlist By My Playlist no.31-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/31.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Psycho</h3>
                            <h5>Red Velvet</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics31()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="31" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By My Playlist no.32-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/32.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>YOUTH</h3>
                            <h5>Troye Sivan</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics32()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="32" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By My Playlist no.33-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/33.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Dandelions</h3>
                            <h5>Ruth B.</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics33()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="33" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By My Playlist no.34-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/34.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Polaroid Love</h3>
                            <h5>ENHYPEN</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics34()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="34" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By My Playlist no.35-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/35.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>다라리(DARARI)</h3>
                            <h5>ENHYPEN</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics35()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="35" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Playlist By My Playlist no.36-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/36.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Weekend</h3>
                            <h5>TAEYEON</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics36()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="36" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By My Playlist no.37-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/37.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Blueming</h3>
                            <h5>IU</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics37()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="37" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Playlist By My Playlist no.38-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/38.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Day 1 ◑</h3>
                            <h5>HONNE</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics38()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="38" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Playlist By My Playlist no.39-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/39.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>I Like Me Better</h3>
                            <h5>Lauv</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics39()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="39" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Playlist By My Playlist no.40-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/40.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>I Loved You</h3>
                            <h5>DAY6 (데이식스)</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics40()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="40" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                    </form>
                  </div>
                  <!--Add on Lyrics No. 31-40-->
                  <div class="box" id="lyrics31" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Psycho - Red Velvet</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Oh oh oh oh oh yeah yeah woo yeah
Psycho
널 어쩌면 좋을까
이런 맘은 또 첨이라
Up and down이 좀 심해
조절이 자꾸 잘 안돼
하나 확실한 건 I don't play the game
우리 진짜 별나대
그냥 내가 너무 좋아해
넌 그걸 너무 잘 알고 날 쥐락펴락해
나도 마찬가지인걸
우린 참 별나고 이상한 사이야
서로를 부서지게 (부서지게)
그리곤 또 껴안아 (그리곤 또 껴안아)
You got me feeling like a psycho psycho
우릴 보고 말해 자꾸 자꾸
다시 안 볼 듯 싸우다가도
붙어 다니니 말야
이해가 안 간대
웃기지도 않대
맞아 psycho psycho
서로 좋아 죽는 바보 바보 (바보 바보)
너 없인 어지럽고 슬퍼져
기운도 막 없어요
둘이 잘 만났대
Hey, now we'll be okay
Hey trouble 경고 따윈 없이 오는 너
I'm original visual
우린 원래 이랬어 yeah
두렵지는 않아
(흥미로울 뿐)
It's hot! let me just hop
어떻게 널 다룰까? ooh
어쩔 줄을 몰라 너를 달래고
매섭게 발로 차도
가끔 내게 미소 짓는 널
어떻게 놓겠어 ooh
우린 아름답고 참 슬픈 사이야
서로를 빛나게 해 (tell me now)
마치 달과 강처럼
그리곤 또 껴안아
You got me feeling like a psycho psycho
우릴 보고 말해 자꾸 자꾸
다시 안 볼 듯 싸우다가도
붙어 다니니 말야
이해가 안 간대
웃기지도 않대
맞아 psycho psycho (맞아 psycho psycho)
서로 좋아 죽는 바보 바보 (바보 바보)
너 없인 어지럽고 슬퍼져
기운도 막 없어요
둘이 잘 만났대
Hey, now we'll be okay
Don't look back
그렇게 우리답게 가보자
난 온몸으로 널 느끼고 있어
Everything will be okay
You got me feeling like a psycho psycho
우릴 보고 말해 자꾸 자꾸
다시 안 볼 듯 싸우다가도
붙어 다니니 말야
둘이 잘 만났대
Hey, now we'll be okay
Hey now we'll be OK
Hey now we'll be OK
Hey now we'll be OK
Hey now we'll be OK
It's alright
It's alright, woo
It's alright, woo
Hey now we'll be OK
Hey now we'll be OK (OK yeah)
Hey now we'll be OK
Hey now we'll be OK
It's alright, oh oh oh
It's alright
우린 좀 이상해 psycho</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics32" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">YOUTH - Troye Sivan</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
What if, what if we run away?
What if, what if we left today?
What if we said goodbye to safe and sound?
What if, what if we're hard to find?
What if, what if we lost our minds?
What if we left them fall behind and they're never found?
And when the lights start flashing like a photo booth
And the stars exploding, we'll be fireproof
My youth, my youth is yours
Trippin' on skies, sippin' waterfalls
My youth, my youth is yours
Runaway now and forevermore
My youth, my youth is yours
A truth so loud you can't ignore
My youth, my youth, my youth
My youth is yours
What if, what if we start to drive?
What if, what if we close our eyes?
What if speeding through red lights into paradise?
'Cause we've no time for getting old
Mortal body, timeless souls
Cross your fingers, here we go, oh oh oh
And when the lights start flashing like a photo booth
And the stars exploding, we'll be fireproof
My youth, my youth is yours
Trippin' on skies, sippin' waterfalls
My youth, my youth is yours
Runaway now and forevermore
My youth, my youth is yours
A truth so loud you can't ignore
My youth, my youth, my youth
My youth is yours
My youth is yours
My youth, my youth is yours
Trippin' on skies, sippin' waterfalls
My youth, my youth is yours
Runaway now and forevermore
My youth, my youth is yours
A truth so loud you can't ignore
My youth, my youth, my youth
My youth is yours
My youth is yours
My youth is yours</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics33" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Dandelions - Ruth B.</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Maybe, it's the way you say my name
Maybe, it's the way you play your game
But it's so good, I've never known anybody like you
But it's so good, I've never dreamed of nobody like you
And I've heard of a love that comes once in a lifetime
And I'm pretty sure that you are that love of mine
'Cause I'm in a field of dandelions
Wishing on every one that you'll be mine, mine
And I see forever in your eyes
I feel okay when I see you smile, smile
Wishing on dandelions all of the time
Praying to God that one day you'll be mine
Wishing on dandelions all of the time, all of the time
I think that you are the one for me
'Cause it gets so hard to breathe
When you're looking at me, I've never felt so alive and free
When you're looking at me, I've never felt so happy
And I've heard of a love that comes once in a lifetime
And I'm pretty sure that you are that love of mine
'Cause I'm in a field of dandelions
Wishing on every one that you'll be mine, mine
And I see forever in your eyes
I feel okay, when I see you smile, smile
Wishing on dandelions all of the time
Praying to God that one day you'll be mine
Wishing on dandelions all of the time, all of the time
Dandelion, into the wind you go
Won't you let my darling know?
Dandelion, into the wind you go
Won't you let my darling know that?
I'm in a field of dandelions
Wishing on every one that you'll be mine, mine
And I see forever in your eyes
I feel okay when I see you smile, smile
Wishing on dandelions all of the time
Praying to God that one day you'll be mine
Wishing on dandelions all of the time, all of the time
I'm in a field of dandelions
Wishing on every one that you'll be mine, mine</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics34" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Polaroid Love - ENHYPEN</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
It's like a polaroid love
사랑 촌스런 그 감정
근데 내 가슴이 뛰어
왜 나 이래 나? (야)
왜 사랑에 목 매는 건지?
어차피 뻔한 감정이잖아
분명 다 안다 믿었지
알고도 빠진 함정인가 봐
나도 모르게 when you call my name
가슴 아프게 나의 심장이 쿵쿵
It's like a polaroid love
사랑 촌스런 그 감정
근데 내 가슴이 뛰어
왜 나 이래 나?
It's like a polaroid love
내 뜻대로 되지 않아
흔한 filter조차 없어
But I love the vibe (yeah, yeah, yeah, yeah)
널 향한 내 맘을 여기
보정 없이 새기는 거야
점점 또렷해져 가지
이 맘은 세상 단 한 장뿐이야
나도 모르게 when you call my name
가슴 아프게 나의 심장이 쿵쿵
It's like a polaroid love
사랑 촌스런 그 감정
근데 내 가슴이 뛰어
왜 나 이래 나?
It's like a polaroid love
내 뜻대로 되지 않아
흔한 filter조차 없어
But I love the vibe (yeah, yeah, yeah, yeah)
Polaroid love
촌스런 그 감정
Polaroid love
I love the vibe
나도 모르게 when you call my name
가슴 아프게 나의 심장이 쿵쿵
It's like a polaroid love
사랑 촌스런 그 감정
근데 내 가슴이 뛰어
왜 나 이래 나?
It's like a polaroid love
내 뜻대로 되지 않아
흔한 filter조차 없어
But I love the vibe (yeah, yeah, yeah, yeah)</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics35" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">다라리(DARARI) - TREASURE</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
다라라라라라리
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
사실 말이지 since seventeen, yeah
널 지켜봤지 말을 못했을 뿐
여전히 네 주윌 맴돌아
두 눈을 뗄 수가 없잖아
혹시 너도 같은 맘일지는
난 안 궁금해 yeah
난 네가 좋으니까
네 눈빛이 흔들려 you already know
너도 원한다는 걸, 네 입가 미소가 번지니까
그걸 보니까 bonita-nita 네가
내가 말했었잖아 you already know
네가 맘에 든단 걸, 네 긴 머리 날리니까
그걸 보니까 bonita-nita 네가
다라라라라라리
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
다라라라라라리
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
Baby 네 덕분에 쏟아지는 아이디어
가뭄에 비 오듯 네가 내게 있어 pressure
조금 서툰 내 표현
노랠 빌려 I give you love
모두 널 향해 흘러
따뜻함을 느껴 네 옆에서 난
호빵 같은 따끈한 사랑이 찾아왔어
Uh umm, excuse me miss
I L-O-V-E Y-O-U
네 눈빛이 흔들려 you already know
너도 원한다는 걸, 네 입가 미소가 번지니까
그걸 보니까 bonita-nita 네가
내가 말했었잖아 you already know
네가 맘에 든단 걸, 네 긴 머리 날리니까
그걸 보니까 bonita-nita 네가
다라라라라라리 (다라라라)
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
다라라라라라리 (다라라라)
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
처음 느껴보는 love like this
Give me love like this
Show you love like this, yeah
따라 불러줄래 sing like this
Oh, sing with me
한 번 더 ah yo (boom chicky boom)
Can you feel my heartbeat? (Boom chicky boom)
기다리고 있잖아 (boom chicky boom)
Doo, doo, doo, doo
너에게 닿길 바라 all for you
다라라라라라리 (다라라라)
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
다라라라라라리 (다라라라)
널 보고 있음 음악이 babe
너를 위한 멜로디 멜로디 yeah
네가 뮤즈니까 잘 들어봐 play it
솔라미파솔
널 닮은 멜로디 (hey, yeah)
솔라미파솔
Oh, fall in love with me (fall in love, fall in love)
솔라미파솔
널 닮은 멜로디 (hey, yeah)
솔라미파솔
Oh, fall in love with me, yeah</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics36" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Weekend - TAEYEON</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
가장 가까운 바다, 혼자만의 영화관
그냥 이끌리는 대로 해도 괜찮으니까
Every morning
울린 beep-beep-beep-beep 소리 귀에 윙윙윙 맴도는
나를 재촉하던 모닝콜 없이 일어나
Cheesecake 한 입
유리컵컵컵 한가득 내린 co-co-coffee 한 잔
아이스로 할래, 아주 여유롭게
문득 시곌 보니, 벌써 시간은 열두시
그래도 아주 느긋해
그리곤 하품 한 번, 한껏 기지개도 켜고
생각해 "오늘 뭐 할까?"
창문 너머 계절에 시선이 닿은 그 순간
쏟아지는 햇살 내 맘을 두드려
내게 손짓하는 싱그러운 바람 타고서
떠나볼래 when the weekend comes
I can do whatever I want
바람 따라 흩어진 cloud
더 자유롭게 we can go (hey)
가장 가까운 바다, 혼자만의 영화관
그냥 이끌리는 대로 해도 괜찮으니까
훌쩍 떠나보는 drive, 뚜벅 걸어도 좋아
뭐든 발길 닿는 대로 지금 떠나보려 해, oh
하루쯤 세상의 얘길 무시한 채
내가 나의 하루를 조립해 보려 해
더는 no, no stress, 고민 안 할래
Move it right, left, right, 내 맘대로
가본 적도 없는 길 뭐가 있든지
I don't need a map when I roll the streets
이어 가보는 이윤 for a little fun
계속 up-up-up, 좀 더 올라가
한쪽 길모퉁이 따라 맘대로 자라난
조그만 이름 모를 꽃 (da-ra-da-da-da-da-ra)
한참을 바라보다 뜨거운 햇살을 피해
벤치에 잠깐 앉아 봐 (oh)
느려지는 걸음 그림자의 속도를 따라
함께 걷는 태양과 발을 맞추고
뒤이을 달빛을 따라 돌아오고 싶은 걸
떠나볼래 when the weekend comes
I can do whatever I want
바람 따라 흩어진 cloud
더 자유롭게 we can go (hey)
아무 계획이 없어서 완벽한 plan
우연히 찾아낸 secret place (oh, whoa, whoa)
그곳에 두고 와 나만의 작은 짐 (두고 와 내 작은 짐)
골목길 끝을 돌아 만나게 될
기분 좋은 surprise 또 설렘 (oh, whoa, whoa)
두근두근 온종일 (하루 종일)
고소한 향기의 coffee shop
눈에 들어오는 예쁜 옷 (눈에 들어)
Do it for the weekend, do it for the weekend
맘에 들어오는 걸 더는 망설이긴 싫은 걸
그래도 돼 when the weekend comes
I can do whatever I want
바람 따라 흩어진 cloud
더 자유롭게 we can go (hey)
가장 가까운 바다, 혼자만의 영화관
그냥 이끌리는 대로 해도 괜찮으니까 (on the weekend)
훌쩍 떠나보는 drive, 뚜벅 걸어도 좋아
뭐든 발길 닿는 대로 지금 떠나보려 해, oh</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics37" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Blueming - IU</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
'뭐해?'라는 두 글자에
'네가 보고 싶어' 나의 속마음을 담아 우
이모티콘 하나하나 속에
달라지는 내 미묘한 심리를 알까 우
아니 바쁘지 않아 nothing no no
잠들어 있지 않아 insomnia-nia-nia
지금 다른 사람과 함께이지 않아
응, 나도 너를 생각 중
우리의 네모 칸은 bloom
엄지손가락으로 장미꽃을 피워
향기에 취할 것 같아 우
오직 둘만의 비밀의 정원
I feel bloom, I feel bloom, I feel bloom
너에게 한 송이를 더 보내
밤샘 작업으로 업데이트
흥미로운 이 작품의 지은이 that's me 우
어쩜 이 관계의 클라이맥스
2막으로 넘어가기엔 지금이 good timing 우
같은 맘인 걸 알아 realize-la-lize
말을 고르지 말아 just reply-la-la-ly
조금 장난스러운 나의 은유에
네 해석이 궁금해
우리의 색은 gray and blue
엄지손가락으로 말풍선을 띄워
금세 터질 것 같아 우
호흡이 가빠져 어지러워
I feel blue, I feel blue, I feel blue
너에게 가득히 채워
띄어쓰기없이 보낼게 사랑인 것 같애
백만송이 장미꽃을, 나랑 피워볼래?
꽃잎의 색은 우리 마음 가는 대로 칠해
시들 때도 예쁘게
우리의 네모 칸은 bloom
엄지손가락으로 장미꽃을 피워
향기에 취할 것 같아 우
오직 둘만의 비밀의 정원
I feel bloom, I feel bloom, I feel bloom
너에게 한 송이를 더 보내</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics38" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Day 1 ◑ - HONNE</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
You'll always be my day one
Day zero when I was no one
I'm nothing by myself
You and no one else
Thankful you're my day one
Thankful you're my
I got lucky
Finding you
I won big the day I came across you
'Cause when you're with me
I don't feel blue
Not a day goes by that I would not redo
Everybody wants to love
It's easy when you try hard enough
(That's right)
You'll always be my day one
Day zero when I was no one
I'm nothing by myself
You and no one else
Thankful you're my day one
I'm thankful you're my day one
When I first met you
It just felt right
It's like I met a copy of myself that night
I don't believe in fate as such
But we were meant to be together, that's my hunch
Everybody wants true love
It's out there if you look hard enough, enough, enough
You'll always be my day one
Day zero when I was no one
I'm nothing by myself
You and no one else
Thankful you're my day one
Hour by hour
Minute by minute
I got mad love for you and you know it
I would never leave you on your own
I just want you to know
You'll always be my day one
Day zero when I was no one
I'm nothing by myself
You and no one else
Thankful you're my day one
(Thankful you're my day one)
You'll always be my day one
Day zero when I was no one
I'm nothing by myself
You and no one else
Thankful you're my day one
(Day one, day one, day one)</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics39" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">I Like Me Better - Lauv</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
To be young and in love in New York City (in New York City)
To not know who I am but still know that I'm good long as you're here with me
To be drunk and in love in New York City (in New York City)
Midnight into morning coffee
Burning through the hours talking
Damn, I like me better when I'm with you
I like me better when I'm with you
I knew from the first time, I'd stay for a long time 'cause
I like me better when
I like me better when I'm with you
I don't know what it is but I got that feeling (got that feeling)
Waking up in this bed next to you swear the room
Yeah, it got no ceiling
If we lay, let the day just pass us by
I might get to too much talking
I might have to tell you something
Damn, I like me better when I'm with you
I like me better when I'm with you
I knew from the first time, I'd stay for a long time 'cause
I like me better when
I like me better when I'm with you
Stay awhile, stay awhile
Stay here with me
Stay awhile, stay awhile, oh
Stay awhile, stay awhile
Stay here with me
Lay here with me, ayy-ayy, ayy-ayy, oh
I like me better when I'm with you (yes, I do, yes, I do, babe)
I like me better when I'm with you (ooh, no)
I knew from the first time, I'd stay for a long time 'cause
I like me better when
I like me better when I'm with you
Better when, I like me better when I'm with you</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics40" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">I Loved You - DAY6 (데이식스)</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
난 너를 원망해
또 너와의 시간을 미워해
너를 잃어버린 난
모든 게 무의미해
그리워하지 않아 난
네가 보고 싶은 게 아냐 난
내게 쥐여준 너의 사랑 (you)
기억해내고 싶지 않아, oh
Really, I loved you
너무 사랑했으니까 그런 거야
잊고 싶어도 잊지 못하니까
그래서 널 잊고 싶은 거야
진심으로, I loved you
널 사랑했던 만큼 더 힘든 거야
미워하고 싶어도
하지 못할 너라서 더 미운 거야
알아 지금 내 말이 정말
바보 같아 보인단 거, 말도 안 되는 거
I know, I know
네가 날 떠나가 버린 그 순간부터
내 세상은 이미 멈춰버린 걸
끝나버린 걸, oh
Really, I loved you
너무 사랑했으니까 그런 거야
잊고 싶어도 잊지 못하니까
그래서 널 잊고 싶은 거야
진심으로, I loved you
널 사랑했던 만큼 더 힘든 거야
미워하고 싶어도
하지 못할 너라서 더 미운 거야
사실은 내가 아무리 너를 지워보려 해도
못한다는 걸 알아, yeah
사실은 네가 나에게 있어 잊혀지지 않을
사람이란 걸 말야
Loved you
잊고 싶어도 잊지 못하니까
그래서 널 잊고 싶은 거야
진심으로, I loved you
널 사랑했던 만큼 더 힘든 거야
미워하고 싶어도 하지 못할
너라서 더 미운 거야</pre>
                    </div>
                    </div>
                  </div>

                </div>
                <!-- End of my playlist -->

                <!-- Start of by music player -->
                <div class="box" id="ByMusicPlayer" style="width: 700px; max-height: 700px; display: none;">
                  <div class="box" style="width: 700px; height:395px;">
                    <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">PLAYLISTS - By Music Player</h2>
                    <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 345px; overflow:auto;">
                      <!--Playlist By Music Player no.21-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/21.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Slow Dancing In The Dark</h3>
                            <h5>Joji</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics21()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="21" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.22-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/22.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Die for you</h3>
                            <h5>Joji</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics22()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="22" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.23-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/23.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>After Hours</h3>
                            <h5>The Weekend</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics23()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="23" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.24-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/24.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Changes</h3>
                            <h5>Jeff Bernat</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics24()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="24" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Playlist By Music Player no.25-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/25.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Green Tea & Honey</h3>
                            <h5>JoDane Amar</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics25()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="25" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.26-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/26.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Roses</h3>
                            <h5>Finn Askew</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics26()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="26" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.27-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/27.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Golden Hours</h3>
                            <h5>JVKE</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics27()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="27" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.28-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/28.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Photograph</h3>
                            <h5>Ed Sheeran</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics28()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="28" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.29-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/29.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Perfect</h3>
                            <h5>Ed Sheeran</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics29()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="29" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Playlist By Music Player no.30-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/30.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>A Thousand Years</h3>
                            <h5>Christina Perri</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics30()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="30" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                      
                    </form>
                  </div>
                  <!-- Add on lyrics No.21-30 -->
                  <div class="box" id="lyrics21" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Slow Dancing In The Dark - Joji</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I don't want a friend (just me)
I want my life in two (my life in two)
Just one more night
Waiting to get there
Waiting for you (all night)
I'm done fighting all night (waiting for you)
When I'm around slow dancing in the dark
Don't follow me, you'll end up in my arms
You have made up your mind
I don't need no more signs
Can you?
Can you?
Give me reasons we should be complete
You should be with him, I can't compete
You looked at me like I was someone else, oh well
Can't you see? (Can't you see?)
I don't wanna slow dance (I don't want to slow dance)
In the dark
Dark
When you gotta run
Just hear my voice in you (my voice in you)
Shutting me out of you (shutting me out of you)
Doing so great (so great, so great)
You
Used to be the one (used to be the one)
To hold you when you fall
Yeah, yeah, yeah (when you fall, when you fall)
I don't fuck with your tone (I don't fuck with your tone)
I don't wanna go home (I don't wanna go home)
Can it be one night?
Can you?
Can you?
Give me reasons we should be complete
You should be with him, I can't compete
You looked at me like I was someone else, oh well
Can't you see?
I don't wanna slow dance (I don't want to slow dance)
In the dark
Dark
In the dark
Dark</pre>
                    </div>
                    </div>
                  </div>
                    <div class="box" id="lyrics22" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Die for you - Joji</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Swear I couldn't sleep a wink last night
No point in turning off the lights
Not the same without your head on my shoulders
Growing pains, but I don't wanna get older
Almost like we left it all on read
Couple feelings never laid to rest
Didn't know that the party was over
And it's true that I need you, get closer
Burning photos, had to learn to let go, whoa
I used to weep
Somebody in another skin (another skin)
I heard that you're happy without me
And I hope it's true (I hope, I hope it's true)
It kills me a little, that's okay
'Cause I'd die for you
You know I'd still die for you
I hope you're getting everything you needed (needed)
Find the puzzle piece and feel completed (completed)
Just wanted you to know every reason
Hope you really know that I mean that
Couldn't see the forest from the trees
The only time we speak is in my dreams
Burning photos, had to learn to let go
I used to weep
Somebody in another skin (another skin)
I heard that you're happy without me
And I hope it's true (I hope, I hope it's true)
It kills me a little, that's okay
'Cause I'd die for you
You know I'd still die for you</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics23" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">After Hours - The Weekend</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Thought I almost died in my dream again (baby, almost died)
Fightin' for my life, I couldn't breathe again
I'm fallin' in too deep (oh)
Without you, don't wanna sleep (fallin' in)
'Cause my heart belongs to you
I'll risk it all for you
I want you next to me
This time, I'll never leave
I wanna share babies
Protection, we won't need
Your body next to me
Is just a memory
I'm fallin' in too deep, oh
Without you, I can't sleep
Insomnia, don't leave, oh
Talk to me, without you I can't breathe
My darkest hours
Girl, I felt so alone inside of this crowded room
Different girls on the floor, distracting my thoughts of you
I turned into the man I used to be, to be
Put myself to sleep
Just so I can get closer to you inside my dreams
Didn't wanna wake up 'less you were beside me
I just wanted to call you and say, and say
Oh, baby, where are you now when I need you most?
I'd give it all just to hold you close
Sorry that I broke your heart, your heart
Never comin' down, uh
I was runnin' away from facin' reality, uh
Wastin' all of my time on livin' my fantasies
Spendin' money to compensate, compensate
'Cause I want you baby
I'll be livin' in Heaven when I'm inside of you
It was definitely a blessing wakin' beside you
I'll never let you down again, again
Oh, baby, where are you now when I need you most?
I'd give it all just to hold you close
Sorry that I broke your heart, your heart
I said, baby, I'll treat you better than I did before
I'll hold you down and not let you go
This time I won't break your heart, your heart, yeah
I know it's all my fault
Made you put down your guard
I know I made you fall
Then said you were wrong for me
I lied to you, I lied to you, I lied to you (to you)
Can't hide the truth, I stayed with her in spite of you
You did some things that you regret, still ride for you
'Cause this house is not a home
Without my baby, where are you now when I need you most?
I gave it all just to hold you close
Sorry that I broke your heart, your heart
And I said, baby, I'll treat you better than I did before
I'll hold you down and not let you go
This time I won't break your heart, your heart, no</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics24" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Changes - Jeff Bernat</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
If there was a picture perfect, that would be us
I could be across the world and I would still have your trust
Don't even gotta question if I'm the one giving up
But you keep saying you've had enough
So tell me where to go 'cause I have nowhere to hide
I just want you by my side
But do I still have your heart? Do I still cross your mind?
Have we grown apart, should we even try?
I still keep your picture frame on the side of my bed
Acting like I'm good, but I can no longer pretend
Keeping myself busy, tryna find something to do
But every time I try, somehow it brings me back to you
So what do I do?
I don't know, I don't know, I don't know
See I used to call you probably ten times a day
But now we on the phone, but we got nothing to say
And every time I hear our song, it don't sound the same
I don't know if I could do another day
So tell me where to go 'cause I have nowhere to hide
I just want you by my side
But do I still have your heart?
Do I still cross your mind?
Have we grown apart, should we even try?
I still keep your picture frame on the side of my bed
Acting like I'm good, but I can no longer pretend
Keeping myself busy, tryna find something to do
But every time I try, somehow it brings me back to you
I know things happen for a reason
But I'm tired of this pain I'm feeling
I don't know if I'm strong enough for these changes
'Cause baby, I still keep your-
I still keep your picture frame on the side of my bed (far side of my bed)
Acting like I'm good, but I can no longer pretend (girl, you know I'll still take care of you)
Keeping myself busy, tryna find something to do (keeping myself busy)
But every time I try (and every time)
Somehow it brings me back to you (see, every time it brings me to you)
I still keep your picture frame on the side of my bed
Acting like I'm good, but I can no longer pretend
Keeping myself busy, tryna find something to do
But every time I try, somehow it brings me back to you</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics25" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Green Tea & Honey - JoDane Amar</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Yeah, yeah, yeah, yeah, yeah
La, la, la, la
Girl, you don't know, nah
What you do to me
When I see that crinkle on your nose
I wonder if you fluently just
Do you
Like you do so effortlessly
I want you right next to me
I want you to be my
Be my, my
Green Tea in the morning
Be my, my sugar honey
You're just so great
I wonder, girl
I wonder why you love me
It's so lovely, can't complain
One day, I'll give you my name
If you're down
If you're down
Be my Green Tea in the morning
Be my, my sugar honey
You're just so great
I wonder, girl
I wonder why you love me
It's so lovely, can't complain
One day I'll give you my name
If you're down
If you're down
I can't describe the feeling you gave
When you blew me away and I
Carry that every day
My sunshine and my moon (you're my moon)
You're all I wanna do (all I wanna do)
Every night until we're through
These little moments that we've got (that we've got)
You make me feel like something I'm not
Green Tea and Honey, babe
So warm and sweet
You're all I need
Just you and me
I said now here we go again
Another verse about how you got me feeling it
I'm feeling very many different types of ways
I just gotta say
I just wanna see you every second of every day
If that's ok then let me know
Yes, I got a flow
That can make us go afloat
Thirty thousand we won't ever hear below
You're a queen and the world is yours to hold, yeah
Baby, I got you
And, baby, you got me
Tell me how you feelin'
Just keep it real and promise we'll find peace
Your smile, it got me
Got me lost like your eyes
Baby, I just want you
Want you to go in
Want you to be my
Green Tea in the morning
Be my, my sugar honey
You're just so great
I wonder, girl
I wonder why you love me
It's so lovely, can't complain
One day I'll give you my name
If you're down
If you're down
Be my Green Tea in the morning
Be my, my sugar honey
You're just so great
I wonder, girl
I wonder why you love me
It's so lovely, can't complain
One day I'll give you my name
If you're down
If you're down</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics26" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Roses - Finn Askew</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely, uh
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely, ay
You're my little pick-me-up, yeah
You fill up my cup, yeah
There's never enough of you
If I could have two of you I would
Maybe that's a bit greedy
We don't gotta keep it PG
Darling, we can just be free, oh
It's on you
It's on you
It's on you
It's on you
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely, ay
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely, yeah
I hate waking up
But waking up with you makes me wanna wake up
I'm a mess-up, you're a mess-up, that's too messed ups
Uh, but we fell into each other's arms
Out of the storm I will put sun to your complexion
I lay my heart on you, yeah, that's my affection
My affection
It's on you (It's on you)
It's on you (It's on you)
It's on you
It's on you
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely, uh
Hey, Rose
I bought you five roses, won't you come to my show?
Show you how to live life, yeah, you know you're fucking gold
Give you all my time if you wanna take it slow
Your soul is lovely
Hey, Rose
Hey, Rose</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics27" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Golden Hours - JVKE</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
It was just two lovers
Sittin' in the car, listening to Blonde, fallin' for each other
Pink and orange skies, feelin' super childish, no Donald Glover
Missed call from my mother
Like, "Where you at tonight?"
Got no alibi, I was all alone

With the love of my life
She's got glitter for skin
My radiant beam in the night
I don't need no light to see you

Shine
It's your Golden Hour
You slow down time
In your golden hour

We were just two lovers
Feet up on the dash, drivin' nowhere fast, burnin' through the summer
Radio on blast, make the moment last, she got solar power
Minutes feel like hours
She knew she was the baddest
Can you even imagine fallin' like I did?

For the love of my life
She's got glow on her face
A glorious look in her eyes
My angel of light

I was all alone with the love of my life
She's got glitter for skin
My radiant beam in the night
I don't need no light to see you

Shine
It's your golden hour
You slow down time
In your golden hour</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics28" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Photograph - Ed Sheeran</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Loving can hurt, loving can hurt sometimes
But it's the only thing that I know
When it gets hard, you know it can get hard sometimes
It is the only thing makes us feel alive
We keep this love in a photograph
We made these memories for ourselves
Where our eyes are never closing
Hearts are never broken
And time's forever frozen, still
So you can keep me
Inside the pocket of your ripped jeans
Holding me closer 'til our eyes meet
You won't ever be alone, wait for me to come home
Loving can heal, loving can mend your soul
And it's the only thing that I know, know
I swear it will get easier
Remember that with every piece of ya
Hmm, and it's the only thing we take with us when we die
Hmm, we keep this love in a photograph
We made these memories for ourselves
Where our eyes are never closing
Hearts were never broken
And time's forever frozen, still
So you can keep me
Inside the pocket of your ripped jeans
Holding me closer 'til our eyes meet
You won't ever be alone
And if you hurt me
That's okay, baby, only words bleed
Inside these pages, you just hold me
And I won't ever let you go
Wait for me to come home
Wait for me to come home
Wait for me to come home
Wait for me to come home
Oh, you can fit me
Inside the necklace you got when you were sixteen
Next to your heartbeat where I should be
Keep it deep within your soul
And if you hurt me
Well, that's okay, baby, only words bleed
Inside these pages, you just hold me
And I won't ever let you go
When I'm away, I will remember how you kissed me
Under the lamppost back on Sixth street
Hearing you whisper through the phone
"Wait for me to come home"</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics29" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Perfect - Ed Sheeran</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I found a love, for me
Darling, just dive right in and follow my lead
Well, I found a girl, beautiful and sweet
Oh, I never knew you were the someone waiting for me
'Cause we were just kids when we fell in love
Not knowing what it was
I will not give you up this time
But darling, just kiss me slow
Your heart is all I own
And in your eyes, you're holding mine
Baby, I'm dancing in the dark
With you between my arms
Barefoot on the grass
Listening to our favourite song
When you said you looked a mess
I whispered underneath my breath
But you heard it
Darling, you look perfect tonight
Well, I found a woman, stronger than anyone I know
She shares my dreams, I hope that someday I'll share her home
I found a lover, to carry more than just my secrets
To carry love, to carry children of our own
We are still kids, but we're so in love
Fighting against all odds
I know we'll be alright this time
Darling, just hold my hand
Be my girl, I'll be your man
I see my future in your eyes
Baby, I'm dancing in the dark
With you between my arms
Barefoot on the grass
Listening to our favorite song
When I saw you in that dress, looking so beautiful
I don't deserve this
Darling, you look perfect tonight
Baby, I'm dancing in the dark
With you between my arms
Barefoot on the grass
Listening to our favorite song
I have faith in what I see
Now I know I have met an angel in person
And she looks perfect
I don't deserve this
You look perfect tonight</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics30" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">A Thousand Years - Christina Perri</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Heart beats fast
Colors and promises
How to be brave?
How can I love when I'm afraid to fall?
But watching you stand alone
All of my doubt suddenly goes away somehow
One step closer
I have died every day waiting for you
Darling, don't be afraid
I have loved you for a thousand years
I'll love you for a thousand more
Time stands still
Beauty in all she is
I will be brave
I will not let anything take away
What's standing in front of me
Every breath, every hour has come to this
One step closer
I have died every day waiting for you
Darling, don't be afraid
I have loved you for a thousand years
I'll love you for a thousand more
And all along I believed I would find you
Time has brought your heart to me
I have loved you for a thousand years
I'll love you for a thousand more
One step closer
One step closer
I have died every day waiting for you
Darling, don't be afraid
I have loved you for a thousand years
I'll love you for a thousand more
And all along I believed I would find you
Time has brought your heart to me
I have loved you for a thousand years
I'll love you for a thousand more</pre>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- End of by music player -->
                <!--Karaoke-->
                <div class="box" id="KaraokeMode_MyPlaylists" style="width: 700px; max-height: 700px; display: none;">
                  <div class="box" style="width: 700px; height:395px;">
                    <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">KARAOKE - My Playlists</h2>
                    <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 345px; overflow:auto;">
                     <!--Karaoke My Playlist no.11-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                      <div class="row">
                        <div class="box" style="width: 70px; height: 55px;">
                          <img src="assets/images/11.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                        </div>
                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                          <h3>Cornelia Street</h3>
                          <h5>Taylor Swift</h5>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi bi-list" onclick="myLyrics11()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi playListPlay bi-play-circle" id="11" style="font-size: 30px; cursor: pointer;"></i>
                        </div>      
                      </div>
                      </div>
      
            
                       <!--Karaoke My Playlist no.12-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/12.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Adore You</h3>
                            <h5>Harry Styles</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics12()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="12" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke My Playlist no.13-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/13.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Circle</h3>
                            <h5>PostMalone</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics13()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="13" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke My Playlist no.14-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/14.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>what would you do?</h3>
                            <h5>Tate McRae</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics14()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="14" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke My Playlist no.15-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/15.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Die for You</h3>
                            <h5>The Weekend</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics15()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="15" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke My Playlist no.16-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/16.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>I Love You So</h3>
                            <h5>The Walters</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics16()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="16" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke My Playlist no.17-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/17.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>About Damn Time</h3>
                            <h5>Lizzo</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics17()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="17" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Karaoke My Playlist no.18-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/18.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>KIWI</h3>
                            <h5>Harry Styles</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics18()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="18" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Karaoke My Playlist no.19-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/19.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Anxiety</h3>
                            <h5>Julia Michaels ft.Selena Gomez</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics19()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="19" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Karaoke My Playlist no.20-->
                       <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/20.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Red (Taylor's version)</h3>
                            <h5>Taylor Swift</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics20()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="20" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                      
                    </form>
                  </div>
                  <div class="box" id="lyrics11" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Cornelia Street - Taylor Swift</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
We were in the backseat
Drunk on something stronger 
than the drinks in the bar
"I rent a place on Cornelia Street"
I say casually in the car
We were a fresh page on the desk
Filling in the blanks as we go
As if the street lights pointed in 
an arrowhead Leading us home
                        
And I hope I never lose you, 
hope it never ends
I'd never walk Cornelia Street again
That's the kind of heartbreak 
time could never mend
I'd never walk Cornelia Street again
                        
And baby, I get mystified by how 
this city screams your name
And baby, I'm so terrified of 
if you ever walk away
I'd never walk Cornelia Street again
I'd never walk Cornelia Street again
                        
Windows swung right open, autumn air
Jacket 'round my shoulders is yours
We bless the rains on Cornelia Street
Memorize the creaks in the floor
Back when we were card sharks, playing games
I thought you were leading me on
I packed my bags, left Cornelia Street
Before you even knew I was gone
                        
But then you called, showed your hand
I turned around before I hit the tunnel
Sat on the roof, you and I
I hope I never lose you, hope it never ends
I'd never walk Cornelia Street again
That's the kind of heartbreak 
time could never mend
I'd never walk Cornelia Street again
And baby, I get mystified by how 
this city screams your name 
(city screams your name)
And baby, I'm so terrified of if you ever walk away
I'd never walk Cornelia Street again
I'd never walk Cornelia Street again
                        
You hold my hand on the street
Walk me back to that apartment
Years ago, we were just inside
Barefoot in the kitchen
Sacred new beginnings
That became my religion, listen
                        
I hope I never lose you
I'd never walk Cornelia Street again
Oh, never again
And baby, I get mystified by how 
this city screams your name
And baby, I'm so terrified of if 
you ever walk away
I'd never walk Cornelia Street again
I'd never walk Cornelia Street again
I don't wanna lose you, hope it never ends
I'd never walk Cornelia Street again
I don't wanna lose you, yeah
"I rent a place on Cornelia Street"
I say casually in the car</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics12" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Adore You - Harry Styles</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Walk in your rainbow paradise 
(paradise)
Strawberry lipstick state of mind 
(state of mind)
I get so lost inside your eyes
Would you believe it?
                        
You don't have to say you love me
You don't have to say nothing
You don't have to say you're mine
                        
Honey (ah)
I'd walk through fire for you
Just let me adore you
Oh, honey (ah)
I'd walk through fire for you
Just let me adore you
Like it's the only thing I'll ever do
Like it's the only thing I'll ever do
                        
You're wonder under summer skies 
(summer skies)
Brown skin and lemon over ice
Would you believe it?
                        
You don't have to say you love me
I just wanna tell you somethin'
Lately you've been on my mind
                        
Honey (ah)
I'd walk through fire for you
Just let me adore you
Oh, honey (ah)
I'd walk through fire for you
Just let me adore you
Like it's the only thing I'll ever do
Like it's the only thing I'll ever do
                        
I'd walk through fire for you
Just let me adore you
Oh, honey (ah)
I'd walk through fire for you
Just let me adore you
Like it's the only thing I'll ever do
(Ah)
I'd walk through fire for you
Just let me adore you
Oh, honey (ah)
Oh, honey
I'd walk through fire for you
Just let me adore you
                        
oh, honey
(Oh)
Just let me adore you
Like it's the only thing I'll ever do</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics13" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Circle - PostMalone</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
We couldn't turn around
'Til we were upside down
I'll be the bad guy now
But, no, I ain't too proud
                        
I couldn't be there
Even when I tried
You don't believe it
We do this every time
                        
Seasons change and our love went cold
Feed the flame 'cause we can't let it go
Run away, but we're running in circles
Run away, run away
                        
I dare you to do something
I'm waiting on you again
So I don't take the blame
Run away, but we're running in circles
Run away, run away, run away
                        
Let go
I got a feeling that it's time to let go
                        
I say so
I knew that this was doomed from the get-go
                        
You thought that it was special, special
But it was just the sex though, the sex though
And I still hear the echoes (the echoes)
I got a feeling that it's time to let it go, 
let it go
                        
Seasons change and our love went cold
Feed the flame 'cause we can't let it go
Run away, but we're running in circles
Run away, run away
                        
I dare you to do something
I'm waiting on you again
So I don't take the blame
Run away, but we're running in circles
Run away, run away, run away
                        
Maybe you don't understand 
what I'm going through
It's only me
What you got to lose?
Make up your mind, tell me
What are you gonna do?
It's only me
Let it go
                        
Seasons change and our love went cold
Feed the flame 'cause we can't let it go
Run away, but we're running in circles
Run away, run away
                        
I dare you to do something
I'm waiting on you again
So I don't take the blame
Run away, but we're running in circles
Run away, run away, run away</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics14" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">what would you do? - Tate McRae</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
You think you're such a cool kid
And everybody likes you
Now you think I'm stupid
Say you know more than I do
But what you'll never understand
Is I used to be such a fan
But now you're such a cool kid
It's like I don't even know you, yeah

I'm getting really sick
Sick of how sorry sounds
Coming right out your mouth, oh
Don't get too comfortable
'Cause I might not be there
Next time you turn around, so

What would you do if I leave and don't come back?
I hope it breaks you in two
If I gave back all the pain that you put me through
What would you do?

I've always been a nice girl
I'm pretty understanding
But you mess up my head, boy
And you're taking me for granted
And you're prolly gonna throw a fit 
(throw a fit)
When I call you out on all your shit 
(all your shit)
Yeah, I used to be a nice girl
I bet you wish it lasted, oh

I'm getting really sick
Sick of how sorry sounds
Coming right out your mouth, oh-oh
Don't get too comfortable
'Cause I might not be there
Next time you turn around, so

What would you do if I leave and don't come back?
I hope it breaks you in two
If I gave back all the pain that you put me through
What would you do?

We'll make plans and I won't show up
I won't listen, I'll interrupt
When your birthday comes, won't answer ya 'cause
So what? So what?
I'll go out and kiss your friends
Like, "Oh my god, get over it"
Yeah, go get drunk so you forget I'm gone

What would you do if I leave and don't come back?
I hope it breaks you in two (breaks you in two)
If I gave back all the pain that you put me through
What would you do?

Ooh-ooh-ooh, ooh-ooh-ooh
What would you do?
Ooh-ooh-ooh, ooh-ooh-ooh
What would you do?</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics15" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Die For You - The Weekend</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I'm findin' ways to articulate 
the feelin' I'm goin' through
I just can't say I don't love you
'Cause I love you, yeah
It's hard for me to communicate 
the thoughts that I hold
But tonight, I'm gon' let you know
Let me tell the truth
Baby, let me tell the truth, yeah
                        
You know what I'm thinkin', see it in your eyes
You hate that you want me, hate it when you cry
You're scared to be lonely, 'specially in the night
I'm scared that I'll miss you, happens every time
I don't want this feelin', I can't afford love
I try to find a reason to pull us apart
It ain't workin', 'cause you're perfect, 
and I know that you're worth it
I can't walk away, oh
                        
Even though we're goin' through it
And it makes you feel alone
Just know that I would die for you
Baby, I would die for you, yeah
The distance and the time between us
It'll never change my mind
'Cause baby, I would die for you
Baby, I would die for you, yeah
                        
I'm findin' ways to manipulate 
the feelin' you're goin' through
But, baby girl, I'm not blamin' you
Just don't blame me, too, yeah
'Cause I can't take this pain forever
And you won't find no one that's better
'Cause I'm right for you, babe
I think I'm right for you, babe
                        
You know what I'm thinkin', see it in your eyes
You hate that you want me, hate it when you cry
It ain't workin', 'cause you're perfect, 
and I know that you're worth it
I can't walk away, oh
                        
Even though we're goin' through it
And it makes you feel alone
Just know that I would die for you
Baby, I would die for you, yeah
The distance and the time between us
It'll never change my mind
'Cause baby, I would die for you, uh
Baby, I would die for you, yeah
                        
I would die for you, I would lie for you
Keep it real with you, I would kill for you
My baby
I'm just sayin', yeah
I would die for you, I would lie for you
Keep it real with you, I would kill for you
My baby
Na-na-na, na-na-na, na-na, ooh
                        
Even though we're goin' through it
And it makes you feel alone
Just know that I would die for you
Baby, I would die for you, yeah
The distance and the time between us
It'll never change my mind
'Cause baby, I would die for you
Baby, I would die for you, yeah (oh, babe)</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics16" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">I Love You So - The Walters</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I just need someone in my life 
to give it structure
To handle all the selfish ways 
I'd spend my time without her
You're everything I want, 
but I can't deal with all your lovers
You're saying I'm the one, 
but it's your actions that speak louder
Giving me love when you are down and need another
I've gotta get away and let you go, 
I've gotta get over
                        
But I love you so (ooh-ooh)
I love you so (ooh-ooh)
I love you so (ooh-ooh)
I love you so (ooh-ooh)
                        
I'm gonna pack my things and leave you behind
This feeling's old and I know that 
I've made up my mind
I hope you feel what I felt 
when you shattered my soul
'Cause you were cruel and I'm a fool
So, please let me go
                        
But I love you so (please let me go)
I love you so (please let me go)
I love you so (please let me go)
I love you so</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics17" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">About Damn Time - Lizzo</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
It's bad bitch o'clock, yeah, it's thick-thirty
I've been through a lot but I'm still flirty 
(okay)
Is everybody back up in the buildin'?
It's been a minute, tell me how you're healin'
'Cause I'm about to get into my feelings
How you feelin'? How you feel right now?

Oh, I've been so down and under pressure
I'm way too fine to be this stressed, yeah
Oh, I'm not the girl I was or used to be
Uh, bitch, I might be better

Turn up the music, turn down the lights
I got a feelin' I'm gon' be alright
Okay (okay), alright
It's about damn time (time)
Turn up the music, let's celebrate (alright)
I got a feelin' I'm gon' be okay
Okay (okay), alright
It's about damn time

In a minute, I'ma need a sentimental
Man or woman to pump me up
Feeling fussy, walkin' in my Balenci-ussy's
Tryna bring out the fabulous
'Cause I give a fuck way too much
I'ma need like two shots in my cup
One to get up, one to get down
Mm, that's how I feel right now

Oh, I've been so down and under pressure
I'm way too fine to be this stressed, yeah
Oh, I'm not the girl I was or used to be
Uh, bitch, I might be better

Turn up the music, turn down the lights
I got a feelin' I'm gon' be alright
Okay (okay), alright
It's about damn time (time)
Turn up the music, let's celebrate (alright)
I got a feelin' I'm gon' be okay
Okay (okay), alright
It's about damn time

Bitch
'Cause, uh, you know that time it is, uh

I'm comin' out tonight, I'm comin' out tonight 
(uh-huh)
I'm comin' out tonight, I'm comin' out tonight 
(woo)
I'm comin' out tonight, I'm comin' out tonight
Okay (okay), alright (alright)
It's about damn time
I'm comin' out tonight, (let's go) I'm comin' out tonight (comin' out tonight)
I'm comin' out tonight, I'm comin' out tonight (woo)
I'm comin' out tonight, I'm comin' out tonight (comin' out tonight)
Okay (okay), alright
It's about damn time

Oh
Bitch
Yeah, yeah
It's about damn time</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics18" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">KIWI - Harry Styles</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
She worked her way through a cheap pack of cigarettes
Hard liquor mixed with a bit of intellect
And all the boys, they were sayin' they were into it
Such a pretty face on a pretty neck

She's drivin' me crazy, but I'm into it
But I'm into it, I'm kinda into it
It's gettin' crazy, I think I'm losin' it
I think I'm losin' it, oh, I think she said

I'm having your baby
It's none of your business
I'm having your baby
It's none of your business 
(it's none of your, it's none of your)
I'm having your baby (hey)
It's none of your business (oh)
I'm having your baby (hey)
It's none of your, it's none of your (ah)

It's New York, baby, always jacked up (hey)
Holland Tunnel for a nose, it's always backed up
When she's alone, she goes home to a cactus (oh)
In a black dress, she's such an actress

Drivin' me crazy, but I'm into it
But I'm into it, I'm kinda into it
It's gettin' crazy, I think I'm losin' it
I think I'm losin' it, oh, I think she said

I'm having your baby (hey)
It's none of your business (oh)
I'm having your baby (hey)
It's none of your business 
(it's none of your, it's none of your)
I'm having your baby (hey)
It's none of your business (oh)
I'm having your baby (hey)
It's none of your, it's none of your

Ah
Ayy, ayy, ayy, ayy, ayy
Ah, la-la-la-la
She sits beside me like a silhouette
Hard candy drippin' on me 'til my feet are wet
And now she's all over me, it's like I paid for it 
(cha-ching)
It's like I paid for it, I'm gonna pay for this

It's none of your, it's none of your
I'm having your baby (hey)
It's none of your business
I'm having your baby (hey)
It's none of your business 
(it's none of your, it's none of your)
I'm having your baby (hey)
It's none of your business
I'm having your baby (hey)
It's none of your business 
(it's none of your, it's none of your)

Hey</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics19" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Anxiety - Julia Michaels ft.Selena Gomez</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
My friends, they wanna take me to the movies
I tell 'em to fuck off, 
I'm holding hands with my depression
And right when I think I've overcome it
Anxiety starts kicking in to teach that shit a lesson
Oh, I try my best just to be social
I make all these plans with friends 
and hope they call and cancel
Then I overthink about the things I'm missing
Now I'm wishing I was with 'em

Feel like I'm always apologizing for feeling
Like I'm out of my mind when I'm doing just fine
And my exes all say that I'm hard to deal with
And I admit it, yeah

But all my friends, 
they don't know what it's like, what it's like
They don't understand why I can't sleep through the night
I've been told that I could take something to fix it
Damn, I wish it, I wish it was that simple, ah
All my friends they don't know what it's like, 
what it's like

Always wanted to be one of those people in the room
That says something and everyone puts their hand up
Like, "If you're sad put your hand up
If you hate someone, put your hand up
If you're scared, put your hand up"

Feel like I'm always apologizing for feeling
Like I'm out of my mind when I'm doing just fine
And my exes all say that I'm hard to deal with
And I admit it, it's true

But all my friends, 
they don't know what it's like, what it's like
They don't understand why I can't sleep through the night
And I thought that I could take something to fix it
Damn, I wish it, I wish it was that simple, ah
All my friends they don't know what it's like, 
what it's like

I got all these thoughts, 
running through my mind
All the damn time and I can't seem to shut it off
I think I'm doing fine most of the time
I think that I'm alright, 
but I can't seem to shut it off
I got all these thoughts, running through my mind
All the damn time and I can't seem to shut it off
I think I'm doing fine most of the time
I say that I'm alright, 
but I can't seem to shut it off
Shut it, shut it, yeah

But all my friends, 
they don't know what it's like, what it's like
They don't understand why I can't sleep through the night
I've been told that I could take something to fix it
Damn, I wish it, I wish it was that simple, ah
All my friends they don't know what it's like, 
what it's like

Li-i-i-i-ike
What it's like, what it's like
Hmm-mm-mm, mmm
What it's like
I love this song</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics20" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Red(Taylor's version) - Taylor Swift</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Loving him is like 
driving a new Maserati down a dead-end street
Faster than the wind, passionate as sin, 
ending so suddenly
Loving him is like trying to change your mind
Once you're already flying through the free fall
Like the colors in autumn, so bright, 
just before they lose it all

Losing him was blue like I'd never known
Missing him was dark gray, all alone
Forgetting him was like 
tryin' know somebody you never met
But loving him was red

Loving him was red

Touching him was like realizing all you ever wanted
Was right there in front of you
Memorizing him was as easy as knowing all the words
To your old favorite song

Fighting with him was like trying to solve a crossword
And realizing there's no right answer
Regretting him was like wishing you never found out
That love could be that strong

Losing him was blue like I'd never known
Missing him was dark gray, all alone
Forgetting him was like 
tryin' know somebody you never met
But loving him was red
Oh, red
Burning red

Remembering him comes in flashbacks and echoes
Tell myself, "It's time now, gotta let go"
But moving on from him is impossible
When I still see it all in my head
In burning red

Loving him was red

Oh, losing him was blue like I'd never known
Missing him was dark gray, all alone
Forgetting him was like tryin' to know
Somebody you never met
'Cause loving him was red
Yeah, yeah, red
We're burning red
And that's why he's spinning 'round in my head
Comes back to me, burning red
Yeah, yeah
His love was like driving a new Maserati down a dead-end street</pre>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="box" id="KaraokeMode_ByMusicPlayer" style="width: 700px; max-height: 700px; display: none;">
                  <div class="box" style="width: 700px; height:395px;">
                    <h2 style="font-size: 23px; font-weight: 710; margin-top:10px; margin-left:50px;">KARAOKE - By Music Player</h2>
                    <form class="my playlist" style="margin-top: 20px; margin-left:50px; max-width: 660px; max-height: 345px; overflow:auto;">
                      <div class="songItem" style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                      <div class="row">
                        <div class="box" style="width: 70px; height: 55px;">
                          <img src="assets/images/1.jpg" class="img-fluid rounded-square" style=" width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                        </div>
                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                          <h3>Lavender Haze</h3>
                          <h5>Taylor Swift</h5>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi bi-list" onclick="myLyrics1()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi playListPlay bi-play-circle" id="1" style="font-size: 30px; cursor: pointer;"></i>
                        </div>
                      </div>
                      </div>

                      <div class="songItem" style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                      <div class="row">
                        <div class="box" style="width: 70px; height: 55px;">
                          <img src="assets/images/2.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                        </div>
                        <div class="box" id="musicinfoshow" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                          <h3>Kiss Me More</h3>
                          <h5>Doja Cat</h5>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi bi-list" onclick="myLyrics2()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi playListPlay bi-play-circle" id="2" style="font-size: 30px; cursor: pointer;"></i>
                        </div>
                      </div>
                      </div>

                      <div class="songItem" style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                      <div class="row">
                        <div class="box" style="width: 70px; height: 55px;">
                          <img src="assets/images/3.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                        </div>
                        <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                          <h3>17 นาที</h3>
                          <h5>MILLI, Mints</h5>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi bi-list" onclick="myLyrics3()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                        </div>
                        <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                          <i class="bi playListPlay bi-play-circle" id="3" style="font-size: 30px; cursor: pointer;"></i>
                        </div>
                      </div>
                      </div>

                      <div class="songItem" style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/4.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" id="musicinfoshow" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>คนไม่คุย</h3>
                            <h5>PROXIE</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics4()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="4" style="font-size: 30px; cursor: pointer;"></i>
                          </div>
                        </div>
                      </div>
                      <!--Karaoke by Music Player no.5-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/5.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Double Take</h3>
                            <h5>Dhruv</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics5()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="5" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke by Music Player no.6-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/6.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Let Me Know</h3>
                            <h5>LANY</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics6()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="6" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke by Music Player no.7-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/7.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Paris in the rain</h3>
                            <h5>Lauv</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics7()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="7" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke by Music Player no.8-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/8.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Reckless</h3>
                            <h5>Madison Beer</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics8()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="8" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                         <!--Karaoke by Music Player no.9-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/9.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>Santa Tell Me</h3>
                            <h5>Ariana Grande</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics9()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="9" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                        <!--Karaoke by Music Player no.10-->
                      <div class="songItem"  style="width: 480px; height: 60px; border: 2px solid rgb(225, 225, 225); background-color: #fff; border-radius: 10px; margin-bottom: 10px;">
                        <div class="row">
                          <div class="box" style="width: 70px; height: 55px;">
                            <img src="assets/images/10.jpg" class="img-fluid rounded-square" style="width: 50px; height:50px; border-radius: 7px; margin-left: 10px; margin-top: 3px;">
                          </div>
                          <div class="box" style="width: 300px; height: 55px; margin-top: 6px; margin-left: 10px;">
                            <h3>We're Good</h3>
                            <h5>Dua Lipa</h5>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi bi-list" onclick="myLyrics10()" style="font-size: 30px; cursor: pointer; margin-left: 5px;"></i>
                          </div>
                          <div class="box" style="width: 50px; height:55px; margin-top: 5px;">
                            <i class="bi playListPlay bi-play-circle" id="10" style="font-size: 30px; cursor: pointer;"></i>
                          </div>      
                        </div>
                        </div>
                
                    </form>
                  </div>
                  <div class="box" id="lyrics1" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Lavender Haze - Taylor Swift</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Meet me at midnight
(Ooh, ooh, ooh, whoa whoa whoa whoa whoa)
Staring at the ceiling with you
Oh, you don't ever say too much
And you don't really read into
My melancholia
I've been under scrutiny (yeah, oh yeah)
You handle it beautifully (yeah, oh yeah)
All this shit is new to me (yeah, oh yeah)
I feel a lavender haze creeping up on me
So real, I'm damned if I do give a damn what people say
No deal, the 1950s shit they want from me
I just wanna stay in that lavender haze
(Ooh, ooh, whoa whoa whoa whoa whoa)
All they keep asking me (all they keep asking me)
Is if I'm gonna be your bride
The only kind of girl they see (the only kind of girl they see)
Is a one night or a wife
I find it dizzying (yeah, oh yeah)
They're bringing up my history (yeah, oh yeah)
But you aren't even listening (yeah, oh yeah)
I feel a lavender haze creeping up on me
So real, I'm damned if I do give a damn what people say
No deal, the 1950s shit they want from me
I just wanna stay in that lavender haze (ooh, ooh, whoa whoa whoa whoa whoa)
That lavender haze
Talk your talk and go viral
I just need this love spiral
Get it off your chest
Get it off my desk (get it off my desk)
Talk your talk and go viral
I just need this love spiral
Get it off your chest
Get it off my desk
I feel (I feel) a lavender haze creeping up on me
So real, I'm damned if I do give a damn what people say
No deal (no deal), the 1950s shit they want from me
I just wanna stay in that lavender haze
(Ooh, ooh, whoa whoa whoa whoa whoa)
Get it off your chest
Get it off my desk
That lavender haze
I just wanna stay
I just wanna stay
In that lavender haze</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics2" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Kiss Me More - Doja Cat</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
We hug and yes, we make love
And always just say "Goodnight" (la-la-la-la-la)
And we cuddle, sure, I do love it
But I need your lips on mine
Can you kiss me more?
We're so young, boy
We ain't got nothin' to lose, oh, oh
It's just principle
Baby, hold me
'Cause I like the way you groove, oh, oh
Boy, you write your name, I can do the same
Ooh, I love the taste, la-la-la-la
All on my tongue, I want it (la-la-la-la)
Boy, you write your name, I can do the same
Ooh, I love the taste, la-la-la-la-la
All on my tongue, I want it
I, I feel like fuckin' somethin'
But we could be corny, fuck it
Sugar, I ain't no dummy, dummy
I like to say, "What if?", but if
We could kiss and just cut the rubbish
Then I might be on to somethin'
I ain't givin' you one in public
I'm givin' you hundreds, fuck it
Somethin' we just gotta get into
Sign first, middle, last, on the wisdom tooth
Niggas wishin' that the pussy was a kissin' booth
Taste breakfast, lunch and gin and juice
And that dinner just like dessert too
And when we French, refresh, gimme two
When I bite that lip, come get me too
He want lipstick, lip gloss, hickeys too, huh
Can you kiss me more?
We're so young, boy
We ain't got nothin' to lose, oh, oh
It's just principle
Baby, hold me
'Cause I like the way you groove, oh, oh
Boy, you write your name, I can do the same
Ooh, I love the taste, la-la-la-la
All on my tongue, I want it (la-la-la-la)
Boy, you write your name, I can do the same
Ooh, I love the taste, la-la-la-la-la
All on my tongue, I want it
Say give me a buck, need that gushy stuff
Push the limit, no, you ain't good enough
All your niggas say that you lost without me
All my bitches feel like I dodged the county
Fuckin' with you feel like jail, nigga (feel like jail)
I can't even exhale, nigga (exhale)
Pussy like holy grail, you know that
You gon' make me need bail, you know that
Caught dippin' with your friend
You ain't even half man, lyin' on ya-, you know that
Got me a bag full of brick, you know that
Control, don't slow the pace if I throw back
All this ass for real (all this ass)
Drama make you feel (make you feel)
Fantasy and whip appeal
Is all I can give you
Can you kiss me more?
We're so young, boy
We ain't got nothin' to lose, oh, oh
It's just principle
Baby, hold me
'Cause I like the way you groove, oh, oh
Oh, darlin'
Boy, you write your name, I can do the same
Ooh, I love the taste, oh-la-la-la-la
All on my tongue, I want it
Boy, you write your name, I can do the same
Ooh, I love the taste, oh-la-la-la-la-la
All on my tongue, I want it</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics3" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">17 นาที - MILLI, Mints</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
หนึ่งนาที เห็นเธอเพิ่งตอบแชต
ส่อง notification แป๊บนึง
บอกตัวเองว่าอย่าไปโฟกัส
สี่นาที ทำไมมันนานจัง
ห้านาที ลุกขึ้นไปกินน้ำ
วิ่งรอบบ้านก็ยังนึกถึงเธอ
เจ็ดนาทีมองนาฬิกาเผลอ
เพ้อถึงเธอทำไมน่ารักจัง
มันยังไม่ถึงเวลาตอบ
สิบนาที ร้องเพลงจนหอบ
สิบเอ็ดนาที เฮ้อ อยากคุยด้วยแล้วโว้ย
สิบสามนาที โอเค
อีกสี่นาทีอะโอเค
สิบสี่ สิบห้า สิบหก สิบเจ็ด ฉันจะตอบอีกใน
สิบ เก้า แปด เจ็ด หก ห้า สี่ สาม สอง
หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง
สิบเจ็ด นาทีที่ฉันรอเธอ
เธอคงไม่รู้ว่าต้องอดทนมากแค่ไหน
สิบเจ็ด นาทีที่ทรมาน ไม่อยากให้เธอรู้ความในใจ
ต้องเก๊กไว้ ตั้งเวลารอตอบเธอ
ที่จริงฉันเองชอบเธอมากเหลือเกินจะทน
แต่ฉันเองก็กลัวเธอจะไม่คิดเหมือนกัน
ก็เราต่างเป็นแบบนี้
มัวแต่ดึงเชงทุกที
แล้วเมื่อไรจะได้คุย
ก็เล่นตอบช้าแบบนี้
เล่นหายไปนานทุกที
ก็คงรอกันต่อไป
สิบ เก้า แปด เจ็ด หก ห้า สี่ สาม สอง
หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง
สิบเจ็ด นาที ที่ฉันรอเธอ
เธอคงไม่รู้ว่าต้องอดทนมากแค่ไหน
สิบเจ็ด นาทีที่ทรมาน ไม่อยากให้เธอรู้ความในใจ
ต้องเก๊กไว้ ตั้งเวลารอตอบเธอ
ที่เป็นแบบนี้
ก็เป็นเพราะเธอกับฉัน เราต่างกันทำให้ชัดเจน
ที่ทำแบบนี้
แต่สุดท้ายก็เป็นฉันที่ต้องช้ำเอง
แต่ฉันยังรอ
สิบเจ็ด นาทีที่ฉันรอเธอ
เธอคงไม่รู้ว่าต้องอดทนมากแค่ไหน
สิบเจ็ด นาทีที่ทรมาน ไม่อยากให้เธอรู้ความในใจ
ต้องเก๊กไว้ ตั้งเวลารอตอบเธอ
สิบ เก้า แปด เจ็ด หก ห้า สี่ สาม สอง
หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง
สิบเจ็ด นาทีที่ฉันรอเธอ
เธอคงไม่รู้ว่าต้องอดทนมากแค่ไหน
สิบเจ็ด นาทีที่ทรมาน ไม่อยากให้เธอรู้ความในใจ
ต้องเก๊กไว้ ตั้งเวลารอตอบเธอ</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics4" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">คนไม่คุย - PROXIE</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
ก็เหมือนไม่ค่อยแคร์ ก็เหมือนไม่ดูแล
ตอบไลน์เธอก็ช้า ช้า ช้า ไม่มีเรื่องคุย
เธอก็คงเริ่มเหนื่อย มาคบคนเรื่อยเปื่อย
ชอบทำตัวมึน
ก็ถึงไม่ชอบคุย แต่ฉันชอบรับฟัง
ส่งไลน์มากี่ครั้งก็อ่าน อ่าน อ่าน ทุกคำ

ช้าไปสักนิด ไม่ใช่ไม่คิด
กลัวไปนาน ๆ เธอจะพาลมองฉันผิด
ทำไงกันดี (ทำไงกันดี)

เราลองเป็นแฟนกันเลยได้ไหม
ก็เพราะฉันเป็นคนไม่คุย (คุยไม่เป็น)
อยากจะอยู่ข้างเธอเงียบ ๆ แค่นี้ (Till the end)
พูดไม่แยะก็คนอย่างฉันมันพูดไม่เยอะ
พูดแค่นั้นแต่คน ๆ นี้ก็จะมีแค่เธอ
รักได้รึเปล่า  รักได้รึเปล่า
พูดไม่เก่งแต่มันรักจริง

ก็เหมือนไม่จริงจัง แต่ฉันนะจริงใจ
พูดออกไปคำไหน ไหน ไหน เชื่อได้ทุกคำ
ชัวร์แล้วจึงค่อยบอก จริงทุกคำไม่หลอก
บอกเธอตรงตรง
ก็ถึงไม่ชอบคุย แต่ฉันชอบรับฟัง
ส่งไลน์มากี่ครั้งก็อ่าน อ่าน อ่าน ทุกคำ

ช้าไปสักนิด ไม่ใช่ไม่คิด
กลัวไปนาน ๆ เธอจะพาลมองฉันผิด
ทำไงกันดี (ทำไงกันดี)
เราลองเป็นแฟนกันเลยได้ไหม
ก็เพราะฉันเป็นคนไม่คุย (คุยไม่เป็น)
อยากจะอยู่ข้างเธอเงียบ ๆ แค่นี้ (Till the end)
พูดไม่แยะก็คนอย่างฉันมันพูดไม่เยอะ
พูดแค่นั้นแต่คน ๆ นี้ก็จะมีแค่เธอ
รักได้รึเปล่า  รักได้รึเปล่า
พูดไม่เก่งแต่มันรักจริง

ฉันอยากจะทักเธอจะตายแค่ไม่แสดงออก
มันอยากบอกรักเธอแล้วไงแต่ไม่มีแรงบอก
พูดไม่ค่อยออก อย่างงี้ก็แย่ดิ
แล้วต้องทำไงแค่พูดออกไปมันก็แค่นี้
แต่ทำไม่เป็นมันต้องทำไงเนี่ยเธอเข้าใจปะ
ก็พูดไม่เก่งตอนอยู่กับเธอเธอคงเข้าใจนะ
มึนดิ เธอดูไม่ออกอีก
ฉันคุยไม่เก่งคนคุยไม่เป็นงั้นมาเป็นแฟนดิ

เราลองเป็นแฟนกันเลยได้ไหม
ก็เพราะฉันเป็นคนไม่คุย (คุยไม่เป็น)
อยากจะอยู่ข้างเธอเงียบ ๆ แค่นี้ (Till the end)
พูดไม่แยะก็คนอย่างฉันมันพูดไม่เยอะ
พูดแค่นั้นแต่คน ๆ นี้ก็จะมีแค่เธอ
รักได้รึเปล่า  รักได้รึเปล่า
พูดไม่เก่งแต่มันรักจริง</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics5" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Double Take - Dhruv</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I could say I never dare
To think about you in that way, but
I would be lyin'
And I pretend I'm happy for you
When you find some dude to take home
But I won't deny that
In the midst of the crowds
In the shapes in the clouds
I don't see nobody but you
In my rose-tinted dreams
Wrinkled silk on my sheets
I don't see nobody but you
Boy, you got me hooked onto something
Who could say that they saw us coming?
Tell me
Do you feel the love?

Spend a summer or a lifetime with me
Let me take you to the place of your dreams
Tell me
Do you feel the love?

And I could say I never unzipped
Those blue Levi's inside my head
But that's far from the truth
Don't know what's come over me
It seems like yesterday when I said
"We'll be friends forever"
Constellations of stars
Murals on city walls
I don't see nobody but you
You're my vice, you're my muse
You're a nineteenth floor view
I don't see nobody but you
Boy, you got me hooked onto something
Who could say that they saw us coming?
Tell me
Do you feel the love?
Spend a summer or a lifetime with me
Let me take you to the place of your dreams
Tell me
Do you feel the love?
Boy, you got me hooked onto something
Who could say that they saw us coming?
Tell me
Do you feel the love?
Spend a summer or a lifetime with me
Let me take you to the place of your dreams
Tell me

Do you feel the love?
Do you feel the love?
Do you feel the love?
Do you feel the love?
Do you feel the love?
Feel the love
Do you feel the love?</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics6" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Let Me Know - LANY</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Blue sky lights up the night, 
it's the morning
I can't get through to you
I wish that this floor would come to life 
and tell the story
'Cause no one knows where I missed my move
                        
How am I supposed to move on if
You don't even know what's really wrong? But
Let me know if there's something 
I can do to fix it
Let me know if you ever change, 
if you ever change, your mind
I can't promise you that I'll be waiting
But for you, I'll leave anything behind
                        
Back and forth, cigarettes and fast talking
I feel you slip away
I can't understand the reasons why 
you say you're leaving
'Cause you were so in love with me yesterday

How am I supposed to move on if
You don't even know what's really wrong? But
Let me know if there's something 
I can do to fix it
Let me know if you ever change, 
if you ever change, your mind
I can't promise you that I'll be waiting
But for you I'll leave anything behind
Let me know if there's something 
I can do to fix it
Let me know if you ever change, 
if you ever change, your mind
I can't promise you that I'll be waiting
But for you I'll leave anything behind
Let me know if there's something 
I can do to fix it
Let me know if you ever change, 
if you ever change, your mind
I can't promise you that I'll be waiting
But for you I'll leave anything behind
Let me know if there's something 
I can do to fix it
Let me know if you ever change, 
if you ever change, your mind
I can't promise you that I'd be waiting
But for you I'll leave anything behind
                        
I still love
I still love
I still love
I still love
I still love you
                        
I still love
I still love you
I still love you
I still love you
I still love you
I still love you</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics7" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Paris in the rain - Lauv</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
All I know is 
(ooh ooh ooh)
We could go anywhere, we could do
Anything, girl, whatever the mood we're in
                        
Yeah all I know is 
(ooh ooh ooh)
Getting lost late at night, under stars
Finding love standing right where we are, 
your lips
                        
They pull me in the moment
You and I alone and
People may be watching, I don't mind
'Cause anywhere with you feels right
Anywhere with you feels like
Paris in the rain
Paris in the rain
We don't need a fancy town
Or bottles that we can't pronounce
'Cause anywhere, babe
Is like Paris in the rain
When I'm with you ooh ooh ooh
When I'm with you ooh ooh ooh
Paris in the rain
Paris in the rain
                        
I look at you now and 
I want this forever
I might not deserve it but 
there's nothing better
Don't know how I ever did it all without you
My heart is about to, 
about to jump out of my chest
Feelings they come and they go, 
that they do
Feelings they come and they go, 
not with you
The late nights
And the street lights
And the people
Look at me girl
And the whole world could stop
Anywhere with you feels right
Anywhere with you feels like
Paris in the rain
Paris in the rain
We don't need a fancy town
Or bottles that we can't pronounce
'Cause anywhere, babe
Is like Paris in the rain
When I'm with you ooh ooh
When I'm with you ooh ooh
Paris in the rain
Paris in the rain
Oh
Girl, when I'm not with you
All I do is miss you
So come and set the mood right
Underneath the moonlight
(Days in Paris
Nights in Paris)
Paint you with my eyes closed
Wonder where the time goes
(Yeah, isn't it obvious?
Isn't it obvious?)

So come and set the mood right
Underneath the moonlight
'Cause anywhere with you feels right
Anywhere with you feels like
Paris in the rain
Paris in the rain
Walking down an empty street
Puddles underneath our feet</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics8" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Reckless - Madison Beer</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Hey, this is a story I hate
And telling it might make me break
But I'll tell it anyway
                        
This chapter's about
How you said there was nobody else
Then you got up and went to her house
You guys always left me out
                        
I still have the letter you wrote
When you told me that I was the only girl
You'd ever want in your life
I guess my friends were right
Each day goes by and each night, I cry
Somebody saw you with her last night
You gave me your word, "Don't worry 'bout her"
You might love her now, but you loved me first
Said you'd never hurt me, but here we are
Oh, you swore on every star
How could you be so reckless with my heart?
                        
You check in and out
Of my heart like a hotel
And she must be perfect, oh well
I hope you both go to hell
I still have the letter you wrote
When you told me that I was the only girl
You'd ever want in your life
I guess my friends were right
                        
Each day goes by and each night, I cry
Somebody saw you with her last night
You gave me your word, "Don't worry 'bout her"
You might love her now, but you loved me first
Said you'd never hurt me, but here we are 
(here we are)
Oh, you swore on every star
How could you be so reckless with my heart? 
(Heart)
How could you be so reckless?
How could you be so reckless?
How could you be so reckless with someone's heart?
Hey, this is a story I hate
But I told it to cope with the pain
I'm so sorry if you can relate</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics9" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">Santa Tell Me - Ariana Grande</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
Santa, tell me if you're really there
Don't make me fall in love again
If he won't be here next year
Santa, tell me if he really cares
'Cause I can't give it all away
If he won't be here next year

Feeling Christmas all around
And I'm trying to play it cool
But it's hard to focus when 
I see him walkin' 'cross the room
"Let it Snow" is blasting out
But I won't get in the mood
I'm avoiding every mistletoe until I know
It's true love that he thinks of
So next Christmas
I'm not all alone, boy

Santa, tell me if you're really there
Don't make me fall in love again
If he won't be here next year
Santa, tell me if he really cares
'Cause I can't give it all away
If he won't be here next year

I've been down this road before
Fell in love on Christmas night 
(ooh, babe)
But on New Year's Day, 
I woke up and he wasn't by my side
Now I need someone to hold
Be my fire in the cold (yeah, yeah)
But it's hard to tell if this is just a fling
Or if it's true love that he thinks of (of)
So next Christmas
I'm not all alone, babe

Santa, tell me if you're really there
Don't make me fall in love again
If he won't be here next year
Santa, tell me if he really cares
'Cause I can't give it all away
If he won't be here next year

Oh, I wanna have him beside me like oh-oh-oh
On the 25th by the fire place, oh-oh-oh
But I don't want a new broken heart
This year I've got to be smart
Ooh, baby
(Santa, tell me, Santa, tell me)
If he will be, if he will be
(Santa, tell me, Santa, tell me)
Oh-oh-oh
Santa, tell me if you're really there 
(Santa, tell me, 'cause I really care)
Don't make me fall in love again
If he won't be here next year
Santa, tell me if he really cares 
(tell me, tell me, boy)
'Cause I can't give it all away
If he won't be here next year
Santa, tell me if you're really there 
(tell me, tell me, baby)
Don't make me fall in love again
If he won't be here next year 
(if he won't be, if he won't be here)
Santa, tell me if he really cares 
(tell me, do you care?)
'Cause I can't give it all away
If he won't be here next year</pre>
                    </div>
                    </div>
                  </div>
                  <div class="box" id="lyrics10" style="width: 700px; height:295px; display: none;">
                    <div class="box bg-white" style="margin-left: 23px; width: 650px; height:286px; border-radius: 20px; border: 2px solid rgb(225, 225, 225);">
                    <h2 style="font-size: 22px; font-weight: 500; margin-top:15px; margin-left:25px;">We're Good - Dua Lipa</h2>
                    <div class="box" style="margin-left: 20px; margin-top: 10px; width: 610px; height:215px; overflow-x: auto; ">
                      <pre style="font-size: 18px; font-weight: 300px; margin-left: 30px;">
I'm on an island
Even when you're close
Can't take the silence
I'd rather be alone
I think it's pretty plain and simple
We gave it all we could
                        
It's time I wave goodbye from the window
Let's end this like 
we should and say we're good
We're not meant to be like 
sleeping and cocaine
So let's at least agree to go 
our separate ways
                        
Not gonna judge you 
when you're with somebody else
As long as you swear you won't be pissed 
when I do it myself
Let's end it like we should and say we're good
                        
No need to hide it
Go get what you want
This won't be a burden 
if we both don't hold a grudge
I think it's pretty plain and simple
We gave it all we could
It's time I wave goodbye from the window
Let's end this like we should 
and say we're good
We're not meant to be like sleeping and cocaine
So let's at least agree to go our separate ways
                        
Not gonna judge you when you're with somebody else
As long as you swear you won't be pissed 
when I do it myself
Let's end it like we should 
and say we're good
Now you're holding this against me
Like I knew you would
I'm trying my best to make this easy
So don't give me that look, 
just say we're good
                        
We're not meant to be like sleeping and cocaine
So let's at least agree to go our separate ways
Not gonna judge you 
when you're with somebody else
As long as you swear you won't be pissed 
when I do it myself
Let's end it like we should and say we're good</pre>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="box" style="width: 329px; height:700px; border-radius: 0 0 35px 0;">
                  <div class="box" style="width: 360px; height:421px; border-radius: 0 0 35px 0;">
                    <h2 style="font-size: 23px; font-weight:710; margin-left: 20px;">Now Playing</h2>
                    <label type="text-small" style="font-size: 12px; font-weight:500; margin-left:21px; color:#424242">56 items on the list</label>
                    
                    <div class="box"style="width: 370px; height:400px; border-radius: 0 0 35px 0;">
                    <div class="box" style="width: 280px; margin-left: 15px; margin-top: 45px;">
                    <div class="container">

                      <div class="music-container md-3">
                        <div id="cover-box">
                          <img src="assets/images/1.jpg" alt="cover-image" id="cover" />
                        </div>
          
                        <div id="music-box">
                          <audio id="disc"></audio>
          
                          <div id="music-info">
                            <h2 id="title">Lavender Haze</h2>
                            <h3 id="artist">Taylor Swift</h3>
          
                            <div class="bar">
                              <input type="range" id="seek" min="0" value="0" max="100">
                              <div class="bar2" id="bar2"></div>
                              <div class="dot"></div>
                            </div>
          
                            <div id="timer-bar">
                              <span id="timer">0:00</span>
                              <span id="duration">3:22</span>
                            </div>
                          </div>
          
                          <div id="control-box">
                            <i id="prev" class="btn fas fa-backward"></i>
                            <i id="play" class="special-btn fas fa-play"></i>
                            <i id="next" class="btn fas fa-forward"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          

        </div>
    </div>

    <script>
        function openTaylor(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(taylor.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "block";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openHarry(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(harry.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "block";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openAriana(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(ariana.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "block";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }
        
        function openBlackpink(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(blackpink.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "block";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openTheweekend(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(theweekend.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "block";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }
        
        function openDoja(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(doja.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "block";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }
        
        function openOlivia(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(olivia.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "block";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openTilly(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(tilly.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "block";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openTreasure(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(treasure.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "block";
                joji.style.display = "none";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openJoji(){
          var bill = document.getElementById("Billboard");
          var taylor = document.getElementById("Taylor");
          var harry = document.getElementById("Harry");
          var ariana = document.getElementById("Ariana");
          var blackpink = document.getElementById("Blackpink");
          var theweekend = document.getElementById("Theweekend");
          var doja = document.getElementById("Doja");
          var olivia = document.getElementById("Olivia");
          var tilly = document.getElementById("Tilly");
          var treasure = document.getElementById("Treasure");
          var joji = document.getElementById("Joji");
          if(joji.style.display === "none") {
                bill.style.display = "none";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "block";
           }
           else {
                bill.style.display = "block";
                taylor.style.display = "none";
                harry.style.display = "none";
                ariana.style.display = "none";
                blackpink.style.display = "none";
                theweekend.style.display = "none";
                doja.style.display = "none";
                olivia.style.display = "none";
                tilly.style.display = "none";
                treasure.style.display = "none";
                joji.style.display = "none";
           }
        }

        function openMP() {
           var mp = document.getElementById("MyPlaylists");
           var bm = document.getElementById("ByMusicPlayer");
           var kmp = document.getElementById("KaraokeMode_MyPlaylists");
           var home = document.getElementById("home");
           var kbm = document.getElementById("KaraokeMode_ByMusicPlayer")
           if(mp.style.display === "none") {
                home.style.display = "none";
                mp.style.display = "block";
                bm.style.display = "none";
                kmp.style.display = "none";
                kbm.style.display = "none";
           }
           else {
                bm.style.display = "none";
                kmp.style.display = "none";
                kbm.style.display = "none";
                home.style.display = "none";
           }
        }
        function openBM() {
           var mp = document.getElementById("MyPlaylists");
           var bm = document.getElementById("ByMusicPlayer");
           var kmp = document.getElementById("KaraokeMode_MyPlaylists");
           var home = document.getElementById("home");
           var kbm = document.getElementById("KaraokeMode_ByMusicPlayer")
           if(bm.style.display === "none") {
                home.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "block";
                kmp.style.display = "none";
                kbm.style.display = "none";
           }
           else {
                mp.style.display = "none";
                kmp.style.display = "none";
                kbm.style.display = "none";
                home.style.display = "none";
           }
        }
        function myLyrics1(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics1.style.display === "none") {
            lyrics1.style.display = "block";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics2(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics2.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "block";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics3(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics3.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "block";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics4(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics4.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "block";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics5(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics5.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "block";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics6(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics6.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "block";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics7(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics7.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "block";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics8(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics8.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "block";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics9(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics9.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "block";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics10(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics10.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "block";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics11(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics11.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "block";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics12(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics12.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "block";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics13(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics13.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "block";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics14(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics14.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "block";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics15(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics15.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "block";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics16(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics16.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "block";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics17(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics17.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "block";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics18(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics18.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "block";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics19(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics19.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "block";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics20(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics20.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "block";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics21(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics21.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "block";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics22(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics22.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "block";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics23(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics23.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "block";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics24(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics24.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "block";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics25(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics25.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "block";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics26(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics26.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "block";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics27(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics27.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "block";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics28(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics28.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "block";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics29(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics29.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "block";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics30(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics30.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "block";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics31(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics31.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "block";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics32(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics32.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "block";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics33(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics33.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "block";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics34(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics34.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "block";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics35(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics35.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "block";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics36(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics36.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "block";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics37(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics37.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "block";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics38(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics38.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "block";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics39(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics39.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "block";
            lyrics40.style.display = "none";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }
        function myLyrics40(){
          var lyrics1 = document.getElementById('lyrics1');
          var lyrics2 = document.getElementById('lyrics2');
          var lyrics3 = document.getElementById('lyrics3');
          var lyrics4 = document.getElementById('lyrics4');
          var lyrics5 = document.getElementById('lyrics5');
          var lyrics6 = document.getElementById('lyrics6');
          var lyrics7 = document.getElementById('lyrics7');
          var lyrics8 = document.getElementById('lyrics8');
          var lyrics9 = document.getElementById('lyrics9');
          var lyrics10 = document.getElementById('lyrics10');
          var lyrics11 = document.getElementById('lyrics11');
          var lyrics12 = document.getElementById('lyrics12');
          var lyrics13 = document.getElementById('lyrics13');
          var lyrics14 = document.getElementById('lyrics14');
          var lyrics15 = document.getElementById('lyrics15');
          var lyrics16 = document.getElementById('lyrics16');
          var lyrics17 = document.getElementById('lyrics17');
          var lyrics18 = document.getElementById('lyrics18');
          var lyrics19 = document.getElementById('lyrics19');
          var lyrics20 = document.getElementById('lyrics20');
          var lyrics21 = document.getElementById('lyrics21');
          var lyrics22 = document.getElementById('lyrics22');
          var lyrics23 = document.getElementById('lyrics23');
          var lyrics24 = document.getElementById('lyrics24');
          var lyrics25 = document.getElementById('lyrics25');
          var lyrics26 = document.getElementById('lyrics26');
          var lyrics27 = document.getElementById('lyrics27');
          var lyrics28 = document.getElementById('lyrics28');
          var lyrics29 = document.getElementById('lyrics29');
          var lyrics30 = document.getElementById('lyrics30');
          var lyrics31 = document.getElementById('lyrics31');
          var lyrics32 = document.getElementById('lyrics32');
          var lyrics33 = document.getElementById('lyrics33');
          var lyrics34 = document.getElementById('lyrics34');
          var lyrics35 = document.getElementById('lyrics35');
          var lyrics36 = document.getElementById('lyrics36');
          var lyrics37 = document.getElementById('lyrics37');
          var lyrics38 = document.getElementById('lyrics38');
          var lyrics39 = document.getElementById('lyrics39');
          var lyrics40 = document.getElementById('lyrics40');
          if(lyrics40.style.display === "none") {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "block";
          }
          else {
            lyrics1.style.display = "none";
            lyrics2.style.display = "none";
            lyrics3.style.display = "none";
            lyrics4.style.display = "none";
            lyrics5.style.display = "none";
            lyrics6.style.display = "none";
            lyrics7.style.display = "none";
            lyrics8.style.display = "none";
            lyrics9.style.display = "none";
            lyrics10.style.display = "none";
            lyrics11.style.display = "none";
            lyrics12.style.display = "none";
            lyrics13.style.display = "none";
            lyrics14.style.display = "none";
            lyrics15.style.display = "none";
            lyrics16.style.display = "none";
            lyrics17.style.display = "none";
            lyrics18.style.display = "none";
            lyrics19.style.display = "none";
            lyrics20.style.display = "none";
            lyrics21.style.display = "none";
            lyrics22.style.display = "none";
            lyrics23.style.display = "none";
            lyrics24.style.display = "none";
            lyrics25.style.display = "none";
            lyrics26.style.display = "none";
            lyrics27.style.display = "none";
            lyrics28.style.display = "none";
            lyrics29.style.display = "none";
            lyrics30.style.display = "none";
            lyrics31.style.display = "none";
            lyrics32.style.display = "none";
            lyrics33.style.display = "none";
            lyrics34.style.display = "none";
            lyrics35.style.display = "none";
            lyrics36.style.display = "none";
            lyrics37.style.display = "none";
            lyrics38.style.display = "none";
            lyrics39.style.display = "none";
            lyrics40.style.display = "none";
          }
        }

        function openKaraokeMP() {
           var mp = document.getElementById("MyPlaylists");
           var bm = document.getElementById("ByMusicPlayer");
           var kmp = document.getElementById("KaraokeMode_MyPlaylists");
           var home = document.getElementById("home");
           var kbm = document.getElementById("KaraokeMode_ByMusicPlayer")
           if(kmp.style.display === "none") {
                home.style.display = "none";
                kmp.style.display = "block";
                kbm.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";
           }
           else {
                kbm.style.display = "none";
                home.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";
           }
        }
        function openHome() {
           var mp = document.getElementById("MyPlaylists");
           var bm = document.getElementById("ByMusicPlayer");
           var home = document.getElementById("home");
           var kmp = document.getElementById("KaraokeMode_MyPlaylists")
           var kbm = document.getElementById("KaraokeMode_ByMusicPlayer")
           if(home.style.display === "none") {
                home.style.display = "block";
                kmp.style.display = "none";
                kbm.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";

           }
           else {
                kmp.style.display = "none";
                kbm.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";
           }

        }
        function openKaraokeBM() {
           var mp = document.getElementById("MyPlaylists");
           var bm = document.getElementById("ByMusicPlayer");
           var kmp = document.getElementById("KaraokeMode_MyPlaylists");
           var home = document.getElementById("home");
           var kbm = document.getElementById("KaraokeMode_ByMusicPlayer")
           if(kbm.style.display === "none") {
                home.style.display = "none";
                kbm.style.display = "block";
                kmp.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";
           }
           else {
                home.style.display = "none";
                kmp.style.display = "none";
                mp.style.display = "none";
                bm.style.display = "none";
           }
        }
    </script>
    <script src="assets/scripts/scriptlist.js"></script>
    <script src="assets/scripts/flickity.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  </body>
</html>
