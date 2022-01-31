# Release Notes

## [Unreleased](https://github.com/devmoath/jql-builder/compare/v1.0.0...master)

Nothing Yet

## [v1.0.0 (2022-01-31)](https://github.com/DevMoath/jql-builder/releases/tag/v1.0.0)

- make `when` and `whenNot` accept callback as well ([79f4b6a](https://github.com/DevMoath/jql-builder/commit/79f4b6ad1ea5a711656aa5a377a124fdd1a558d0)), ([1375ffd](https://github.com/DevMoath/jql-builder/commit/1375ffdc7e62751a9197f9ce8ddfe5bd4a9c0a16))
- add `appendQuery` function to reduce duplicate code ([93c904f](https://github.com/DevMoath/jql-builder/commit/93c904f867b5533b8765625fc740fcc56f0b4ff3))
- add `orderBy` function ([21e26ed](https://github.com/DevMoath/jql-builder/commit/21e26ed760d930310d8625034287677351ee8c04))
- add `rawQuery` function ([50b79c1](https://github.com/DevMoath/jql-builder/commit/50b79c1b2b13b02e08ff5890f4c6f1fc890a27b0))
- increase the PHPStan level ([#6](https://github.com/DevMoath/jql-builder/issues/6)) ([cad88cf](https://github.com/DevMoath/jql-builder/commit/cad88cfd75a78c27d767d30667f830232f07ce08))
- return `$this` if the callback does not return anything ([#5](https://github.com/DevMoath/jql-builder/issues/5)) ([cf7aaa1](https://github.com/DevMoath/jql-builder/commit/cf7aaa17f898c1727c7b32ba4a46109fff77105c))
- Throw exception when `$operator` is illegal for the `$value` type ([#2](https://github.com/DevMoath/jql-builder/issues/2)) ([3ffedf1](https://github.com/DevMoath/jql-builder/commit/3ffedf185039012a4c6d8f62f9c084f9a4c868fb))
- Extract the constants to new class base on its type ([#9](https://github.com/DevMoath/jql-builder/pull/9)) ([c3eebea](https://github.com/DevMoath/jql-builder/commit/c3eebea6455a2ad220888ff46e3c400cc321d671))
- Remove my personal username from namespace ([#11](https://github.com/DevMoath/jql-builder/pull/11)) ([a507e41](https://github.com/DevMoath/jql-builder/commit/a507e41312d328590114e713df6123ae96854525))
- Escape quotes in value/s ([#12](https://github.com/DevMoath/jql-builder/pull/12)) ([2bfdf12](https://github.com/DevMoath/jql-builder/commit/2bfdf129daa42838c7f9d45306263e3031cfbfb4))
- remove whereFiled function and use the base where function ([#13](https://github.com/DevMoath/jql-builder/pull/13)) ([68f0e7e](https://github.com/DevMoath/jql-builder/commit/68f0e7ef583d1c50bf036886d1100d7327bcf1e7))

## [v0.0.3 (2021-09-20)](https://github.com/DevMoath/jql-builder/releases/tag/v0.0.3)

- use spatie/macroable to add custom functions ([f747960](https://github.com/DevMoath/jql-builder/commit/f7479607c5b3356e9dfb294154b2fb9c5b1dd35c))

## [v0.0.2 (2021-09-17)](https://github.com/DevMoath/jql-builder/releases/tag/v0.0.2)

- Add `when()` function to add where clause based on condition ([c62c841](https://github.com/DevMoath/jql-builder/commit/c62c8411180bf59bd44c66600675115224737a64))
- Add missing operators and keywords ([2c95b62](https://github.com/DevMoath/jql-builder/commit/2c95b62f5b014a3ab781832c067544a1bea61e9d))
- Add helper functions ([ac6fa4e](https://github.com/DevMoath/jql-builder/commit/ac6fa4e07277081e3ae6b2cafde2517943974708)), ([63ede81](https://github.com/DevMoath/jql-builder/commit/63ede81d6c50e5d94617c90cb287e1756721ee2a))
- Add ability to use `AND` and `OR` operators between conditions ([8d47ae6](https://github.com/DevMoath/jql-builder/commit/8d47ae6ab070347b57dcef7504cd593114085c4b))
- Make the `Jql` class as final class ([e9ecf66](https://github.com/DevMoath/jql-builder/commit/e9ecf663af5835a17286dd61d5bf67d45d680879))
- Change the logic of creating the conditions which now uses where function as base of all functions ([d916039](https://github.com/DevMoath/jql-builder/commit/d9160392006aa8d7e03ce1f297d1a1eec37f87f3))

## [v0.0.1 (2021-09-15)](https://github.com/DevMoath/jql-builder/releases/tag/v0.0.1)

- initial release
