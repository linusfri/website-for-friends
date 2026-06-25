{
  pkgs,
  lib,
  config,
  inputs,
  ...
}:
let
  php = pkgs.php84;

  devDeps = {
    inherit php;
    inherit (pkgs) wp-cli nodejs_24;
    inherit (php.packages) composer;
  };

  name = "bedrock";
in
{
  inherit name;

  # Include git in dev shell
  packages = [ pkgs.git ] ++ builtins.attrValues devDeps;

  services.linusfri = {
    mysql = {
      enable = true;
      dbName = name;
    };

    phpServer = {
      enable = true;
      inherit php;
      domains = [ "${name}.local" ];
      serveDir = "web";
      appType = "wordpress";
      # assetFallbackUrl = "https://www.${name}.se";
    };
  };
}
