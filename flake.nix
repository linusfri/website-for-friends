{
  description = "Flake for bedrock wordpress build";

  nixConfig.sandbox = "relaxed";

  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs";
    utils.url = "github:numtide/flake-utils";
    nix-filter.url = "github:numtide/nix-filter";
  };

  outputs = { self, nixpkgs, utils, nix-filter, ... }:
    utils.lib.eachDefaultSystem (system:
      let
        pkgs = import nixpkgs { inherit system; };
      in
      {
        packages = {
          bedrock-wp = pkgs.callPackage ./default.nix { inherit pkgs nix-filter; };
          default = self.outputs.packages."${system}".bedrock-wp;
        };
      });
}
