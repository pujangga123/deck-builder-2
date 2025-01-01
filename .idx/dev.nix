# To learn more about how to use Nix to configure your environment
# see: https://developers.google.com/idx/guides/customize-idx-env
{ pkgs, ... }: {
  # Which nixpkgs channel to use.
  channel = "stable-23.11"; # or "unstable"

  # Use https://search.nixos.org/packages to find packages
  packages = [
    # pkgs.go
    # pkgs.python311
    # pkgs.python311Packages.pip
    # pkgs.nodejs_20
    # pkgs.nodePackages.nodemon
    pkgs.php81
    pkgs.php81Packages.composer
  ];

  # Sets environment variables in the workspace
  env = { };
  idx.extensions = [
    # "vscodevim.vim"
  ];
  idx.previews = {
  };
}
